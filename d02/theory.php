#!/usr/bin/php
<?PHP
$np = preg_match("/toto/", "sdjkgdsgjkhtotosdfsgd");
//     /^t[oi]t[oi]$/  - at the begining and the end could be or O or I inside the []
//   /t[0-9]t[a-z]/           [0-9] == any number between 0 and 9; [a-z] == any char
// * + {4} - exactly 4 numbers preceding that
// [^0-9] - everything but not that
// /t([io]t\1/    "\1"  - looks for what matches in first parentheses ([io]) if it match an I it'll look for another I || if it match an O it will look for another O
// $name ="key";
// $$name = "val";  // $$ did $key = "val";
// echo $key."\n";

// $tab = file("data.csv");

// foreach($tab as $elem)
// {
//     echo "$elem";
// }
//file_get_contents();
//fopen();
//fgets();
// $fd = fopen("data.csv", "r");
// while ($line = $fgets($fd))
//      echo $line;
// fgetcsv();
//echo $np."\n";

//eval
//eval("echo 'Hello World';"); // - executes php code

//=== will check the type of the other side , and wont cast types
// if (array_search(..., ...) !== FALSE)

// curl - client url library
$c = curl_init("https://www.42.fr"); // handler || fd
$str = curl_exec($c);
echo $str;

\	general escape character with several uses
^	assert start of subject (or line, in multiline mode)
$	assert end of subject or before a terminating newline (or end of line, in multiline mode)
.	match any character except newline (by default)
[	start character class definition
]	end character class definition
|	start of alternative branch
(	start subpattern
)	end subpattern
?	extends the meaning of (, also 0 or 1 quantifier, also makes greedy quantifiers lazy (see repetition)
*	0 or more quantifier
+	1 or more quantifier
{	start min/max quantifier
}	end min/max quantifier

\	general escape character
^	negate the class, but only if the first character
-	indicates character range
