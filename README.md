# PHP homemade API controller
Quick experiments on making more readable API controllers for my [PHP lightweight "framework"](https://github.com/dkvz/php-lightweight).

It currently gets extremely ugly if your API controller does a few different things (horrible chain of if else ifs).

## Security
It's super important to register allowed endpoints on the controller for two reasons:
- Can selectively enable and disable features
- Prevents the situation in that users can basically call ANY public method on the controller class

# TODO
- Add namespaces
- The endpoints array given to constructor could also route specific HTTP methods
- Add a method to the base class that gets the request body through php://input, and another one that does it as JSON