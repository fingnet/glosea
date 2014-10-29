## Router

## Controller

### Properties

- app
- requst
- response
- rest
- params
- view

### Rest

- find(array $object | string $id)
- findOne(array $object | string $id)
- create(array | string $fields)
- update(array | string $fields)
- delete()

### Request

- is()
- isXhr()
- isMobile()
- withJSON()
- wantJSON()
- getMethod()
- getIP()
- param()
- post($key)
- get($key)

### Response

- render()
- header()
- sendHeader()
- write()
- send()
- clear()
- cahce()
- fetch()
- end()
- json()
- jsonp()
- attachment()
- download()
- status()
- redirect()
- location()

## Model

### Properties

- attributes
- connection
- tableName
- types
- autoPk
- autoCreatedAt
- autoUpdatedAt
- guarded
- hidden
- visible

### Method

- count(array $object | string $id)
- create(array $data)
- update(array $object | string $id,array $data)
- delete(array $object | string $id)
- batch()
- find()
- findOne()
- findOrCreate()
- query()
- raw()
- where()
- limit()
- top()
- skip()
- sort()
- page()
- execute()
- set()
- get()
- isset()
- unset()
- save()
- toArray()
- toJSON()
- on()
- id()
- idName()

### attribute

- type
  - string
  - text
  - integer
  - float
  - date
  - datetime
  - boolean
  - timestamp
  - binary
  - array
  - json
  - validations
    - alpha
    - alphadashed
    - alphanumeric
    - alphanumericdashed
    - decimal
    - email
    - **qq**
    - **zip**
    - **word**
    - **chinesePhone**
    - **chinese**
    - **chineseDaily**
    - **html**
    - number
    - numeric
    - hexadecimal
    - hexColor
    - ip
    - ipv4
    - ipv6
    - url
    - urlish
    - uuid
- required
- unique
- primaryKey
- enum
- size
- len
- max
- maxLength
- min
- minLength
- between
- empty
- notEmpty
- null
- notNull
- in
- notIn
- after
- before
- contains
- notContains
- is
- regex
- columnName
- index
- protected
- autoIncrement
- defaultsTo
- toLowercase
- toUppercase
- inFilter
- outFilter

## Service

## View

### Properties

- attributes
- layout
- template
- engine
- charset

### Method

- render()
- assign()
