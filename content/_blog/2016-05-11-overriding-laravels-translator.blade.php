@extends('_includes.blog_post_base')

@section('post::title', 'Extending Laravel\'s Translator')
@section('post::date', 'May 15, 2016')
@section('post::id', 'extending-laravels-translator')
@section('post::brief')
    @markdown
    Like most of the core framework, Laravel's [Translator](https://laravel.com/docs/5.2/localization) is simple, straightforward and easy to use. There's a `Lang` static facade for it as well as two global helper functions `trans()` and `trans_choice()` that pretty much cover just about every normal use case. But what if we want to modify the default behavior a bit?
    @endmarkdown
@stop

@section('pageTitle')@yield('post::title')@stop
@section('post::headerImage','flags.jpg')
@section('post::thumbImage','flags_thumb.jpg')
@section('post::tags','Laravel')

@section('post_body')

    @markdown
    Like most of the core framework, Laravel's [Translator](https://laravel.com/docs/5.2/localization) is simple, straightforward and easy to use. There's a `Lang` static facade for it as well as two global helper functions `trans()` and `trans_choice()` that pretty much cover just about every normal use case. But what if we want to modify the default behavior a bit?

    My team has a project where not only do we want to support multiple languages, but also custom terminology within a language depending on our customer's needs. For example, for one customer we would refer (using English examples here) to <i>trainees</i> and <i>supervisors</i> while in another group we would refer to <i>students</i> and <i>mentors</i>. Since this still primarily a language concern, we'll leverage the Translator class.

    The first order of business will be to make sure that when we ask the app for a Translator instance, either via the `trans()` method or via the `Lang` facade, we get an instance of our custom Translator class. Let's start with a test. Create a file at `app/tests/Foundation/TranslatorTest.php` and enter:

```php
    class TranslatorTest extends TestCase
    {
        /**
         * Verify that app['translator'] returns our translator
         */
        public function testTranslatorInstanceIsCustom()
        {
            $this->assertEquals('App\\Foundation\\Translator', get_class($this->app['translator']));
        }
    }
```

    This test is just getting the registered instance of the Translator, and checking its class. We're comparing strings here because we haven't created our custom Translator class. Run `phpunit` from the root of your app and you'll see the test fails, as expected.

     Let's create the Translator class. Create a file at `app/Foundation/Translator.php` and enter:

```php
    namespace App\Foundation;

    use Illuminate\Translation\Translator as LaravelTranslator;

    class Translator extends LaravelTranslator
    {}
```

    If we were to run `phpunit` again, it will still fail. The key to just about everything in Laravel is a service provider. We need to tell the framework that when we ask for a Translator instance, we want our custom class. Normally you'd create a provider via `php artisan make:provider` but we're going to just extend an existing provider so just create an empty file at `app/Providers/TranslationServiceProvider.php` and enter:

```php
    namespace App\Providers;

    use App\Foundation\Translator;
    use Illuminate\Translation\TranslationServiceProvider as LaravelTranslationProvider;

    class TranslationServiceProvider extends LaravelTranslationProvider
    {
        public function register()
        {
            $this->registerLoader();

            $this->app->singleton('translator', function ($app) {
                $loader = $app['translation.loader'];
                $locale = $app['config']['app.locale'];

                $trans = new Translator($loader, $locale);
                $trans->setFallback($app['config']['app.fallback_locale']);

                return $trans;
            });
        }
    }
```

    If you compare this with `Illuminate\Translation\TranslationServiceProvider::register()` you'll notice that it's *exactly the same*. The difference is that in our version, `Translator` resolves to `App\Foundation\Translator`. So now in our app when we use the `Lang::line()` facade method or the `trans()` helper (I nearly always use the helper), we'll be calling the singleton instance of our extended Translator class.

    Now that our custom Translator class exists, let's modify our test a bit:

```php
    use \Illuminate\Support\Facades\Lang;
    use \App\Foundation\Translator;

    class TranslatorTest extends TestCase
    {
        /**
         * Verify that app['translator'] returns our translator
         */
        public function testTranslatorInstanceIsCustom()
        {
            $this->assertInstanceOf(Translator::class, $this->app['translator']);
            $this->assertInstanceOf(Translator::class, trans());
            $this->assertInstanceOf(Translator::class, Lang::getFacadeRoot());
        }
    }
```

    Run `phpunit` and we're green. Honestly, we can just stop here and you'll likely know what to do. But for the sake of illustration let's go ahead and make our custom Translator do something. Back in my app's example, we use :traineeWord when we want 'trainee' or 'student' depending on context. Let's add another test to our suite:

<pre class="line-numbers" data-start="16"><code class="language-php">
        /**
         * Verify that translator uses the word for 'trainee' preferred by a specified organization.
         */
        public function testTranslatorUsesDynamicWord()
        {
            $orgA = Mockery::mock('App\\Organization');
            $orgA->shouldReceive('traineeWord')->andReturn('trainee');

            $translator = $this->app['translator'];
            $translator->setOrganization($orgA);
            $this->assertEquals('trainee',trans(':traineeWord'));

            $orgB = Mockery::mock('App\\Organization');
            $orgB->shouldReceive('traineeWord')->andReturn('student');
            $translator->setOrganization($orgB);
            $this->assertEquals('student',trans(':traineeWord'));

            $translator->setLocale('es'); // Español
            $this->assertEquals('estudiante',trans(':traineeWord'));
        }
</code></pre>

    Let's quickly run down what this test is doing. At **line 21** we create a mock of our app's Organization model. At **line 22** we want the organization to return the string 'trainee' when `traineeWord()` is called, but only once. **Lines 24-26** check that the translated string works. Note that this could be a line in a language file, but if the line does not exist, Translator just returns the line unchanged. At **lines 28-31** we get a new mock Organization who prefer 'student' over 'trainee' so we run make the call again and it's correct. Finally at **lines 33-34** we set the locale (language) to 'es' (Spanish) and check that we get the Spanish equivalent for English 'student'.

    Run `phpunit` and of course it fails because we need to create the `Translator::setOrganization()` method and override the Laravel default behavior for `Translator::get()` to use it:

```php
    namespace App\Foundation;

    use App\Organization;
    use Illuminate\Translation\Translator as LaravelTranslator;

    class Translator extends LaravelTranslator
    {
        private $organization;

        public function get($key, array $replace = [], $locale = null, $fallback = true)
        {
            $line = parent::get($key, $replace, $locale, $fallback);
            return $this->replaceDynamicWords($line);
        }

        public function setOrganization(Organization $org)
        {
            $this->organization = $org;
        }

        private function replaceDynamicWords($line)
        {
            $traineeWord = parent::get("dynamic_words.{$this->organization->traineeWord()}");
            return str_replace(':traineeWord',$traineeWord,$line);
        }
    }
```

    The call in our test to `trans(':traineeWord')` helper just proxies to `Translator::get()`, which itself just calls `parent::get()` but before returning the result, we send it to `replaceDynamicWords()`. **Line 23** gets the word as set in the organization's preferences, and then translates it from a file with all possible words for 'trainee'. The lang/en/dynamic_words.php file will have lines like:

```php
    return [
        'trainee' => 'trainee',
        'student' => 'student'
    ];
```

    The lang/es/dynamic_words.php file will have the equivalents:

```php
    return [
        'trainee' => 'aprendiz',
        'student' => 'estudiante',
    ]
```

    Finally we replace the placeholder ':traineeWord' with our translated word. If the organization uses 'student', then `:traineeWord` will become 'student' in English and 'estudiante' in Spanish. Our tests should cover this, so now if run `phpunit` we're green!

    Obviously, this example is quite simplistic and frankly a lot of work for the sake of replacing a single word! But replace the single traineeWord with an array of 'dynamic words' from the organization's preferences, or inject a DynamicWordManager into your Translation and suddenly things become much more useful.

    @endmarkdown
@stop

