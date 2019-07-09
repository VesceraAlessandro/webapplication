# webapplication

## API
Per le API che gestiscono l'autenticazione ho utilizzato il package Passport di laravel , che permette di avere un'autenticazuione completa con un server OAuth2.
Per le API che gestiscono la timbratura (nel progetto le ho chiamate presenze) ho utilizzato le routes e i controller di Laravel.

### Login API
Per il login è necessario l'username e la password dell'utente. Il percorso dell'API è http://127.0.0.1:8000/api/auth/login. L'API va testata tramite un POST e inserendo i dati in un form.

### Signup API
Per il signup è necessario l'username, la mail, la password e la riconferma della password. Il percorso dell'API è http://127.0.0.1:8000/api/auth/signup. L'API va testata tramite un POST e inserendo i dati in un file JSON.

### GetAuthUser API
Per ritornarsi l'utente loggato bisogna inserire il token Bearer che ci è stato rilasciato al login . Il percorso dell'API è http://127.0.0.1:8000/api/auth/getAuthUser. L'API va testata tramite un GET.

### Logout API
Per il logout bisogna inserire il token Bearer che ci è stato rilasciato al login . Il percorso dell'API è http://127.0.0.1:8000/api/auth/logout. L'API va testata tramite un get. All'logout il token viene revocato e non è più utilizzabile.

### GetAllPresences API
Per ritornarsi tutte le presenze bisogna inserire il percorso dell'API http://127.0.0.1:8000/api/presences/getAllPresences. L'API va testata tramite un GET

### GetSpecificUserPresences API
Per ritornarsi le specifiche presenze di untente bisogna inserire l'id dell'utente. Il percorso dell'API http://127.0.0.1:8000/api/presences/getSpecificUserPresences. L'API va testata tramite un GET.

### IinsertPresence API
Per inserire una specifica presenza bisogna inserire l'id dell'utente e lo stato della presenza. Il percorso dell'API http://127.0.0.1:8000/api/presences/insertPresence. L'API va testata tramite un POST.

### UpdatePresence API
Per modificare una specifica presenza bisogna inserire l'id della presenza e lo stato della presenza modificato. Il percorso dell'API http://127.0.0.1:8000/api/presences/updatePresence. L'API va testata tramite un PUT e inserendo i dati in un x-www-form-undercoded.

### DeletePresence API
Per eliminare una specifica presenza bisogna inserire l'id della presenza. Il percorso dell'API http://127.0.0.1:8000/api/presences/deletePresence. L'API va testata tramite un DELETE e inserendo i dati in un x-www-form-undercoded.

### GetAllUsers API
Per ritornarsi tutti gli utenti bisogna inserire il percorso dell'API http://127.0.0.1:8000/api/users/getAllUsers. L'API va testata tramite un get.
