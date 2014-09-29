## Router

## Controller

### Properties

- app
- requst
- response
- rest
- params
- view

### Method

- isAjax()
- isMobile()
- withJSON()
- getMethod()
- getIP()
- param()
- post()
- get()
- getInt()
- getFloat()
- getBool()
- find()
- findOne()
- create()
- update()
- delete()

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

- count()
- create()
- update()
- delete()
- batch()
- find()
- findOne()
- query()
- raw()
- where()
- limit()
- top()
- skip()
- sort()
- page()
- execute()
- get()
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
