# Servers With PHP 

The purpose of this repo is to create different implementations of PHP servers using
sockets and utilize worker and threading patterns for handling load.



### Socket Server
The Socket server uses a Queue => Worker pattern to handle incoming requests. <br>
The worker has a Manager which in turn manages a Worker Pool of multiple workers. <br>
<br>
Next up is implementing a Threading pattern, and achieving multi-threading with several workers 
handling the Queue in different threads. 
 

### Web_server1.0
The folder web_server1.0 contains a simple implementation of a server that opens up a
socket on a specified port (80) and listens for incoming request. <br>
When a new client connects to the port, the server reads the request sent from the client and returns a response with a html payload.
The server can be access through a web browser, or using curl, Postman, telnet or any other

Two routes are defined: 
1. '/'
2. '/home'
