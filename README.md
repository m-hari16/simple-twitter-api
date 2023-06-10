## API Spec

#### Login via Google
- Endpoint:
```sh
[GET] {base_url}/api/login/google
```

- Header: 
````json
{
  "Content-Type": "application/json",
  "Accept": "application/json",
  "x-api-key": "provided_api_key_by_developer"
}
````

- Response:
````json
{
  "code": 200,
  "success": true,
  "message": "Ok",
  "data": {
    "url": "https://url/to/login/google"
  }

}
````

#### Create Tweet
- Endpoint:
```sh
[POST] {base_url}/api/tweet
```

- Header: 
````json
{
  "Content-Type": "application/json",
  "Accept": "application/json",
  "Authorization": "Bearer token_provided_after_login"
}
````

- Request Body:
````json
{
  "content" : "your content for tweet that limit 200 characters",
  "attachFile": "base64:format_file"
}
````

- Response:
````json
{
  "code": 201,
  "success": true,
  "message": "Data created successfully",
  "data": {
    "tweet_id": "encode_tweet_id",
    "content": "your content for tweet that limit 200 characters",
    "attachFileUrl": "https://url/to/file",
    "createdAt": "timestamp"
  }

}
````

#### List Tweet
- Endpoint:
```sh
[DELETE] {base_url}/api/tweet
```

- Header: 
````json
{
  "Content-Type": "application/json",
  "Accept": "application/json",
  "Authorization": "Bearer token_provided_after_login"
}
````

- Response:
````json
{
  "code": 200,
  "success": true,
  "message": "Ok",
  "data": {
    [
      "tweet_id": "encode_tweet_id",
      "content": "your content for tweet that limit 200 characters",
      "attachFileUrl": "https://url/to/file",
      "createdAt": "timestamp"
    ],
    [
      "tweet_id": "encode_tweet_id",
      "content": "your content for tweet that limit 200 characters",
      "attachFileUrl": "https://url/to/file",
      "createdAt": "timestamp"
    ]
  }
}
````

#### Delete Tweet
- Endpoint:
```sh
[GET] {base_url}/api/tweet/{tweet_id}
```

- Header: 
````json
{
  "Content-Type": "application/json",
  "Accept": "application/json",
  "Authorization": "Bearer token_provided_after_login"
}
````

- Response:
````json
{
  "code": 201,
  "success": true,
  "message": "Data deleted successfully",
  "data": {
    "tweet_id": "encode_tweet_id",
    "content": "your content for tweet that limit 200 characters",
    "attachFileUrl": "https://url/to/file",
    "createdAt": "timestamp"
  }
}
````

#### Logout