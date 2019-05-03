php -S localhost:8100 
curl 'localhost:8100'

-c, --cookie-jar <filename>
              (HTTP) Specify to which file you want curl to write all cookies after a completed operation. Curl writes all cookies from its in-memory cookie storage to the given file at the end of operations. If  no  cookies  are
              known, no data will be written. The file will be written using the Netscape cookie file format. If you set the file name to a single dash, "-", the cookies will be written to stdout.

              This command line option will activate the cookie engine that makes curl record and use cookies. Another way to activate it is to use the -b, --cookie option.

              If  the cookie jar can't be created or written to, the whole curl operation won't fail or even report an error clearly. Using -v, --verbose will get a warning displayed, but that is the only visible feedback you get
              about this possibly lethal situation.

			  If this option is used several times, the last specified file name will be used.
			  
-b, --cookie <data>
              (HTTP) Pass the data to the HTTP server in the Cookie header. It is supposedly the data previously received from the server in a "Set-Cookie:" line.  The data should be in the format "NAME1=VALUE1; NAME2=VALUE2".

              If no '=' symbol is used in the argument, it is instead treated as a filename to read previously stored cookie from. This option also activates the cookie engine which will make curl record incoming  cookies,  which
              may be handy if you're using this in combination with the -L, --location option or do multiple URL transfers on the same invoke.

              The file format of the file to read cookies from should be plain HTTP headers (Set-Cookie style) or the Netscape/Mozilla cookie file format.

              The file specified with -b, --cookie is only used as input. No cookies will be written to the file. To store cookies, use the -c, --cookie-jar option.

              Exercise  caution  if  you are using this option and multiple transfers may occur.  If you use the NAME1=VALUE1; format, or in a file use the Set-Cookie format and don't specify a domain, then the cookie is sent for
              any domain (even after redirects are followed) and cannot be modified by a server-set cookie. If the cookie engine is enabled and a server sets a cookie of the same name then both will be sent on a  future  transfer
              to that server, likely not what you intended.  To address these issues set a domain in Set-Cookie (doing that will include sub domains) or use the Netscape format.

              If this option is used several times, the last one will be used.

			  Users very often want to both read cookies from a file and write updated cookies back to a file, so using both -b, --cookie and -c, --cookie-jar in the same command line is common.
			  
You can ask the remote server for ONLY the headers by using the --head (-I) option which 
will make curl issue a HEAD request. In some special cases servers deny the HEAD method 
while others still work, which is a particular kind of annoyance.

The HEAD method is defined and made so that the server returns the headers exactly the 
way it would do for a GET, but without a body. It means that you may see a 
Content-Length: in the response headers, but there must not be an actual body in the 
HEAD response.