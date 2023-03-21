

var bar=document.getElementById('bar');
var flag=0;
bar.addEventListener('click', function(){
    if(flag==0){
    document.getElementsByClassName('info-content')[0].style.display='block';
        flag++;
    }else{
    document.getElementsByClassName('info-content')[0].style.display='none';
        flag--;
    }
});

let slide = document.querySelector('#box');

side_bar = () =>{

}


// function getcost(){
//     console.log(booking.cost.value);
//     var d=booking.cost.value;
//     return d;
// }
// var co=getcost();
// // console.log(cost);
// console.log(co);


function change(cost){
    // console.log(cost);

    
    var member=booking.family_member.value;
    booking.cost.value=cost*member;
    console.log(member);
}

