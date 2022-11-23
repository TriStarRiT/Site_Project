db = openDatabase("db", "1.0", "DataBase", 200000);

function CreateTable(){
    db = openDatabase("db", "1.0", "DataBase", 200000);
    db.transaction(function(tx)
    {
        tx.executeSql('CREATE TABLE IF NOT EXISTS user (user_id serial NOT NULL PRIMARY KEY autoincrement, Second_name varchar(20) NOT NULL, First_name varchar(20) NOT NULL, Father_name varchar(20), email varchar(50) NOT NULL, password varchar(50) NOT NULL, telephone varchar(11) NOT NULL, date_of_birth datetime NOT NULL');
    })
    alert("Таблица создана!");
    if(!db){
        alert("Failed to connect to database.");
    }
}

function IncertRows(){
    db=openDatabase("db", "1.0", "DataBase", 200000);
    var Second_n=document.getElementById("tx1").value;
    var First_n=document.getElementById("tx2").value;
    var Father_n=document.getElementById("tx3").value;
    var mail=document.getElementById("tx4").value;
    var pas=document.getElementById("tx5").value;
    var tel=document.getElementById("tx6").value;
    var birth=document.getElementById("tx7").value;

    var db=openDatabase("db", "1.0", "DataBase", 200000);
    db.transaction(function (tx){
        tx.executeSql('INSERT INTO user (Second_name, First_name, Father_name, email, password, telephone, date_of_birth) VALUES(?,?)', [Second_n, First_n, Father_n, mail, pas, tel, birth]);
    })
    alert("Значения вставлены");
}