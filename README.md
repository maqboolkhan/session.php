session.php
===========

**Important**: This is just simple PHP class for session management it does not
provide secure or encrypted session and any thing alike its just a wrapper which
i code because

1.  I don't like associative array syntax i want to access my session keys as we
    do access object's properties!!

2.  It let me protect my session keys so i can't overwrite my protected keys
    until unless i do not remove them first!

How to:
=======

Session class's constructor accept two `optional`parameters

1.  Protected fields [Array]

2.  Should i start session or not (by default `true`)

let forget protected fields right now! now if you create `Session` class's object as

~~~php
$mysession = new Session([], false)
~~~

here you did not provide any protected field and pass `false` as second
argument remember these arguments are optional! in this situation `session.php`
will not start session automatically and you have to do it manually later

and to start session you can do

~~~php
$mysession->start();
~~~

Setting values:
===============

After creating Session class object we can do

~~~php
$mysession->name = "maqbool";
$mysession->age = 21;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

and you can keep setting your values infinite times!

Get values:
===========

~~~php
echo $mysession->name;
echo $mysession->age;
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Protected fields:
=================

We can define protected field while constructing session class's object and when
we set value of protected field after then we can can not overwrite value of it
otherwise it will throw exception and to reset its value you have to manually remove
last value of it first as

~~~php
$mysession = new Session(['csrf']);

$mysession->csrf = "xse345fds";  # here we know csrf is a protected field

# so now if we try to do
$mysession->csrf = "hello";
# here a exception will raise

# so to set csrf valu again first do
$mysession->remove('csrf');

#now we can set value
$mysession->csrf = "hello";
~~~

Check if key exists:
====================

~~~php
$mysession = new Session();
$mysession->name = "maq";

var_dump($mysession->has('name'));   # it will return true
var_dump($mysession->has('age'));   # it will return false
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Ending session:
====================

~~~php
$mysession->destroy();
~~~


Clear all session data:
====================

~~~php
$mysession->clear();
~~~

Get all session data:
====================

~~~php
$mysession->data();
~~~

Thats all folk :)
