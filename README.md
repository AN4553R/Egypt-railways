# Egypt railways

## Motivation 

Web app to query train times in Egypt

> **Details**:

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

> **Approach**:

- Get start_id and end_id from the user
- get their ID from the station's table
- search in the stops table about all the trains
that leaves from a station with ID less that or equal the start_id, arrive to a station  with ID bigger than or equal the end_id
and from the required train's class

<details align="center">
    <summary align="center"><strong>Tools and Technologies</strong></summary>
    PHP7, PDO, MySQL, HTML, CSS, Bootstrap,  JS and JQuery
</details>

<details align="center">
    <summary align="center"><strong>Principles/Patterns</strong></summary>
    Single responsibility and Interface Segregation
</details>

![screen 1](/AA.png)

![screen 2](/subA.png)

![screen 3](/A.png)

![screen 3](/B.PNG)

# Installation
<center> <h2>Installation</h2> </center>

Clone the repository
```console
foo@bar:~$ git clone https://github.com/Abdulrahmannaser/Micro-blog.git
```
Then run each of these files through accessing them as end points in ur local host

- [create the database](/createDB.php)
- [load data](/loadData.php)
- [background pic](/thumb-1920-552786.jpg)

<center><h2>License</h2></center>

[MIT License](https://github.com/Abdulrahmannaser/Egypt-railways/blob/master/LICENSE)
