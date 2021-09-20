## 1.1 과일가게 access token 발급
##### Request
##### Path : [GET] /api/product/token
##### Response
```javascript
{
  "accessToken": "6BYNQsD4WZExgjooY4jCzV4AQA4gFIaTm3K5Sxqr5_aG166Y4zXREV_vxg9fwPjA"
}
```

## 1.2 과일 목록 조회
##### Request
##### Path : [GET] /api/product/list

##### headers 
Authorization : accessToken

##### Response
```javascript
[
  "배",
  "토마토",
  "사과",
  "바나나"
]
```

## 1.3 과일 가격 조회
##### Request
##### Path : [GET] /api/product

##### headers 
Authorization : accessToken

##### query params
name : "배"  // 과일 이름

##### Response
```javascript
{
  "name": "배",
  "price": 3000
}
```


## 2.1 채소가게 access token 발급
##### Request
##### Path : [GET] /api/item/token
##### Response
```javascript
{
  "accessToken": "WjLULbBnvngmXQiAuDEQcnFJGfOvWGtBJ4sYWi9xyKJVUQGuQiIhdgKAZdM3_uIW"
}
```

## 2.2 채소 목록 조회
##### Request
##### Path : [GET] /api/item/list

##### headers 
Authorization : accessToken

##### Response
```javascript
[
  "치커리",
  "토마토",
  "깻잎",
  "상추"
]
```

## 2.3 채소 가격 조회
##### Request
##### Path : [GET] /api/item

##### headers 
Authorization : accessToken

##### query params
name : "깻잎"  // 채소 이름

##### Response
```javascript
{
  "name": "깻잎",
  "price": 1500
}
```
