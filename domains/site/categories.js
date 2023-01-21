let checktime=0;

function check_cat(){
    if(checktime==0){
        cat_open();
        arrow_open()
        checktime=1;
    }
    else{
        cat_close();
        arrow_close()
        checktime--;
    }
}

function cat_open(){
    document.getElementById('cat').style='opacity:1;';
    document.getElementById("ones").disabled = true;
}
function cat_close(){
    document.getElementById('cat').style='opacity:0;';
    document.getElementById("ones").disabled = true;
}
function arrow_open(){
    document.getElementById('arrow').className='arrow_open';
}
function arrow_close(){
    document.getElementById('arrow').className='arrow_close';
}