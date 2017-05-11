<?php
namespace School;
use School\lib\Db;

//use School\Controller\UserController;
//use School\Model\UserModel;
//use School\lib\DB;

//use School\Model\CourseModel;
//use School\Controller\CourseController;

//use School\Model\CourseModel;
use School\Model\StudentModel;
use School\Model\UserModel;

require_once 'lib\DB.php';
require_once 'model\UserModel.php';
require_once 'model\CourseModel.php';
require_once 'model\StudentModel.php';

/**
 * UserModel
 */
//$m = new UserModel( DB::getConnection() );


//var_dump( $m->getUserByEmail( 'example@example.com' ) );


/*$args = [
    'username' => 'Dalit',
    'email' => 'example@example.com',
    'password' => '',
    'firstname' => 'Dalit',
    'lastname' => 'Schmidt'
];

var_dump( $m->createUser( $args ) );*/


/*$args = [
    'user_username' => 'Dalit',
    'user_email' => 'example@example.com',
    'password' => '',
    'firstname' => '',
    'lastname' => ''
];

var_dump( $m->updateUser ( 3, $args) );*/

//var_dump( $m->deleteUser( 3 ) );

/**
 * CourseModel
 */

//$c = new CourseModel( DB::getConnection() );

//var_dump( $c->createCourse( $args ) );

//var_dump( $c->deleteCourse( 3 ) );

/*$args = [
    'name' => 'Full Stack',
    'description' => 'Is it reasonable to expect mere mortals to have mastery over every facet of the development stack? Probably not, but Facebook can ask for it. I was told at OSCON by a Facebook employee that they only hire ‘Full Stack’ developers.  Well, what does that mean?',
    'image' => 'http://blog.debugme.eu/wp-content/uploads/2016/01/Cover-Image.png'
];*/

//var_dump( $c->updateCourse( 9, $args ) );

/**
 * StudentModel
 */
$s = new StudentModel( DB::getConnection() );

$args = [
    'username' => 'Dalit1313',
    'email' => 'example1313@example.com',
    'password' => '1313',
    'firstname' => 'Dalit',
    'lastname' => 'Schmidt',
    'image' => 'http://blog.debugme.eu/wp-content/uploads/2016/01/Cover-Image.jpg'
];

//var_dump( $s->createStudent( $args ) );

var_dump( $s->updateStudent ( 13, $args) );

/*$args = [
    'image' => 'http://blog.debugme.eu/wp-content/uploads/2016/01/Cover-Image.png'
];

var_dump( $s->updateStudent ( 3, $args) );*/

//var_dump( $s->deleteStudent( 12 ) );