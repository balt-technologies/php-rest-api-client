# php-rest-api-client
General API Client to consume REST API

## Using the Client and making Requests

### Create an API client

    $client = new ApiClient();

### Create (POST) requests

    $response = $client->create('https://httpbin.org/post', ['key' => 'value']); //or
    $response = $client->post('https://httpbin.org/post', ['key' => 'value']);
    
### Get request

    $response = $client->get('https://httpbin.org/get');
    
### Delete request

    $response = $client->delete('https://httpbin.org/delete');
    
### Update (Patch)

    $response = $client->update('https://httpbin.org/patch', ['key' => 'value']); //or
    $response = $client->patch('https://httpbin.org/patch', ['key' => 'value']);

### Put

    $response = $client->put('https://httpbin.org/put', ['key' => 'value']);
    
    
## Advanced Usage

### Logging

    $log = new Logger('api');
    $log->pushHandler(new RotatingFileHandler('./log/api.log', 7));
    $log->pushHandler(new ErrorLogHandler());

    $client->setLogger($log);