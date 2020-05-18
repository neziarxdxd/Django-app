import socket                   # Import socket module

port = 8000                   # Reserve a port for your service.
s = socket.socket()             # Create a socket object
host = socket.gethostname()     # Get local machine name
s.bind((host, port))            # Bind to the port
s.listen(5)                     # Now wait for client connection.
print('Server listening....')
rotate = True
while rotate:

    conn, addr = s.accept()     # Establish connection with client.
    print ('Got connection from', addr)
    data = conn.recv(1024)
    print('Server received', repr(data))

    

    filename='mytext.txt'
    f = open(filename,'rb')
    l = f.read(1024)

    while (l):
       conn.send(l)
       print('Sent ',repr(l))
       l = f.read(1024)
    f.close()

    rotate = False

    print('Done sending')
   
    conn.sendall('\n End'.encode('utf-8'))
    conn.close()
   
   