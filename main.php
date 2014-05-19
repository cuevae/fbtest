<?php

/****************************************************************************
 *
 * Question 1 - Reference variable in foreach loops
 *
 ****************************************************************************/

$testArray = array( 0, 1, 2 );

foreach ( $testArray as $key => &$value )
{
    $value++;
}

foreach ( $testArray as $key => $value )
{
    --$value;
}

//var_dump( $testArray );

/****************************************************************************
 *
 * Question 2 - Type Juggling Mathematical Operations
 *
 ****************************************************************************/

$var1 = 1.0;
$var2 = 2;
$var3 = $var2 / $var1; //2 (float)
$var4 = false;
$var5 = true;
$var6 = "3three";
$var7 = "four4";
$var8 = "five";

$result1 = $var2 * ( ( $var3 * $var4 ) + $var5 + $var6 );
$result2 = ( $var2 * $var3 ) / ( ( $var1 * $var5 ) + $var6 + $var8 );
$result3 = $var8 + $var6 + $var3 - $var1 + $var9;
$result4 = $var8 - $var7 - $var4 + $var2 - $var9;

/*echo "result1: " . gettype( $result1 ) . "\n" . var_dump( $result1 ) . "\n";
echo "result2: " . gettype( $result2 ) . "\n" . var_dump( $result2 ) . "\n";
echo "result3: " . gettype( $result3 ) . "\n" . var_dump( $result3 ) . "\n";
echo "result4: " . gettype( $result4 ) . "\n" . var_dump( $result4 ) . "\n";*/

/****************************************************************************
 *
 * Question 6 - PHP variables
 *
 ****************************************************************************/

@$foo = 'This is a test';
$variable = 'This is a test';
$someVar = &$variable;
${0x0} = 'This is a test';
$_variable = 'This is a test';
//$0x0;

//var_dump( ${0x0} );

/****************************************************************************
 *
 * Question 9 - Array operations ( combine, merge, + )
 *
 ****************************************************************************/

$array1 = array( 0, 1 );
$array2 = array( 2, 3 );
$array3 = array( 4, 5 );
$array4 = array( 6, 7 );

$result = array_merge( array_combine( $array1, $array2 ), $array3 ) + $array4;

$t1 = array_combine( $array1, $array2 );
$t2 = array_merge( $t1, $array3 );
$t3 = $t2 + $array4;

//var_dump( $result );
//var_dump( $t1, $t2, $t3 );

/****************************************************************************
 *
 * Question 10 - Array operations ( array_reduce )
 *
 ****************************************************************************/

$array = array( '1test', 'test2', 't3st', 'test4', 'te5t' );

$result = array_reduce( $array, function ( $result, $item )
{
    if ( preg_match( '#^test\d+$#', $item ) )
    {
        $result[] = $item;
    }

    return $result;
}, array() );

//var_dump( $result );

/****************************************************************************
 *
 * Question 11 - Unary operations
 *
 ****************************************************************************/

$value1 = 1;
$value2 = 2;
$value3 = 3;

$result = ( $value1++ ) - ( --$value2 ) + ( $value3++ ) + ( $value1 ) + ( ++$value2 ) + ( $value3 );

//var_dump( $result );

/****************************************************************************
 *
 * Question 12 Array operations ( sql_injection )
 *
 ****************************************************************************/

if ( empty( $_POST['user'] ) === false
     && empty( $_POST['pass'] ) === false
)
{
    $user = $_POST['user'];
    $pass = md5( $_POST['pass'] );

    $user = $db->query( 'SELECT * FROM users WHERE user = ' . $user . ' AND pass = ' . $pass );

    if ( $user )
    {
        session_start();
        $_SESSION['user_id'] = $user['id'];

        return true;
    }

    return false;
}