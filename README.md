# Development_Task
**Follow this steps to use the App**

- [create the database](/createDB.php)
- [load data](/loadData.php)
- [background pic](/thumb-1920-552786.jpg)

`Egypt railways`

**My idea is that**:

three tables to descripe the whole application

`trains`:

- ID descripes the train
- leaving time
- arrival time
- duration of waiting
- velocity
- class
  
`stations`:

- ID descripes the station's number from Alex to Aswan
- name descripes governorate
  
`stops`:

- train_id descripes the train that will stop
- start_id descripes the station id that the train leaving from
- end_id   descripes the station id that the train arrive to
- stop_time descripes arrival time
- line descripes station line

**Now I'm showing my approach**:

- Get start_id and end_id from the user
- get their ID from the station's table
- search in the stops table about all the trains
that leaves from a station with ID less that or equal the start_id, arrive to a station  with ID bigger than or equal the end_id
and from the required train's class

![screen 1](/AA.png)

![screen 2](/subA.png)

![screen 3](/B.png)

![screen 3](/A.png)

