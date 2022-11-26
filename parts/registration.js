var Entered_user;
var db = openDatabase("db", "1.0", "DataBase", 200000);

/* Создание таблицы с юзерами */ 
function CreateTable() {
    db = openDatabase("db", "1.0", "DataBase", 200000);
    db.transaction(function (tx) {
        tx.executeSql('CREATE TABLE IF NOT EXISTS user (user_id serial NOT NULL PRIMARY KEY autoincrement, Second_name varchar(20) NOT NULL, First_name varchar(20) NOT NULL, Father_name varchar(20), email varchar(50) NOT NULL, password varchar(50) NOT NULL, telephone varchar(11) NOT NULL, date_of_birth datetime NOT NULL');
    })
    alert("Таблица создана!");
    if (!db) {
        alert("Failed to connect to database.");
    }
}

function IncertRowsUser() {
    var Second_n = document.getElementById("tx1").value;
    var First_n = document.getElementById("tx2").value;
    var Father_n = document.getElementById("tx3").value;
    var mail = document.getElementById("tx4").value;
    var pas = document.getElementById("tx5").value;
    var tel = document.getElementById("tx6").value;
    var birth = document.getElementById("tx7").value;

    var db = openDatabase("db", "1.0", "DataBase", 200000);
    db.transaction(function (tx) {
        tx.executeSql('INSERT INTO user (Second_name, First_name, Father_name, email, password, telephone, date_of_birth) VALUES(?,?,?,?,?,?,?)', [Second_n, First_n, Father_n, mail, pas, tel, birth]);
    })
    alert("Значения вставлены");
}

function GetRowsUser() {
    var username =document.getElementById("tx1").value;
    var password =document.getElementById("tx2").value;
    db = openDatabase("db", "1.0", "DataBase", 200000);
    db.transaction(function(tx){
        tx.executeSql('SELECT * FROM user', [], function (tx, result){
            alert("dasd");
            
            /*for (var i=0;i<result.rows.length;i++)
            {
                var item=result.rows.item(i);
                    User_check(item.user_id, item.email, item.password, username, password);
                    User_check(item.user_id, item.First_name, item.Father_name, item.email, item.password, item.telephone, item.date_of_birth);
               
            }*/
        },function(tx, error){
            alert("Ошибка!");
        })
    })
}
function User_check(/*user_id, email, password_db, username, password*/){
    alert("1");
    /*if(password_db==password){
        Entered_user=user_id;
        alert(Entered_user);
    }
    else{
        alert("Что-то не то!");
    }*/
}
