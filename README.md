# Using dependency injection and SOLID principles with Symfony : The Geocoding example

Example app made for a [Medium article](https://medium.com/@lucas.delobelle/dependency-injection-and-solid-principles-with-symfony-the-geocoding-example-f18ad08ed20b?source=friends_link&sk=e7bd2f466e1b9b885754678c47a9027f).

The scope of the article is **only** Dependency Injection & SOLID principles. That's why you won't find :

- Authentication system
- Fixtures
- Unit/Functional tests
- Advanced error handling

## Configuration

In your `.env.local` file, put the following vars :

```env
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7

GOOGLE_MAPS_API_KEY=xxxxxxxxxxxxxx
```

## Countries

A `countries.csv` file is available in the `data` directory. Don't hesitate to implement your own fixtures method in order to automate countries integration into your database.

I didn't do it here because it's not the scope of the article, but I figured it would be cool to have the file and the possibility to do it yourself.

## Event Subscriber

The Event Subscriber is implemented into `src\EventSubscriber\DestinationCoordinatesSubscriber.php`.

It will trigger on `prePersist` & `preUpdate`.
