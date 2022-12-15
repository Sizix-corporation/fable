
# Fable 

Fable est une application web qui permet à chaque éditeurs de distributer 
du  contenu assez rapidement ( histoires et livres)


## Installation

Install poject 

```bash
  composer install 
  install all dependencies php for this project 
```

```bash
  php artisan migrate 
  migrate database 
``` 

```bash
  php artisan key:generate 
  install all dependencies js for this project 
```

```bash
  php artisan serve 
  install all dependencies js for this project 
```


go to http://127.0.0.1:8000

## Tech Stack

**Server:** laravel php , Mysql Db






## Authors

- [@p2510](https://www.github.com/p2510) 


## Features

- CRUD story
- CRUD book
- Like system
- Comment system
- Option shared 
- newsletters 
- Authentification 




## Running Tests

To run tests, run the following command

```bash
  php artisan test 
```


## API Reference


### Story
#### Get all items

```http
  GET /api/story
```

#### Get specific story

```http
  GET /api/story/{story}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `story`      | `number` | **Required**. Id of item  |


#### Create item

```http
  POST /api/story
```

#### Update item

```http
  PUT/PATCH  /api/story/{story}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `story`      | `number` | **Required**. Id of item  |


#### Delete item

```http
  DELETE /api/story/{story}
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `story`      | `number` | **Required**. Id of item  |



## Auth api 

#### User Authentificated

```http
  GET /api/user
```


#### login

```http
  POST /login
```

#### logout

```http
  POST /logout
```

#### register

```http
  POST /register
```

#### reset password 

```http
  POST /reset-password 
```

#### sanctum cookies

```http
  GET /sanctum/csrf-cookie
```
