console.log("Fetch all the books data..")

function getBookData(){
    var httpReq = new XMLHttpRequest();
    httpReq.onreadystatechange = function(){
        if(this.readyState ==4 && this.status == 200){
            console.log(this.responseText);
        // }else{
        }
    };
    httpReq.open("GET", "data.js", true);
    httpReq.send();
    console.log("Data is fetched");
}

// console.log("Fetch all the books data..")

// function getBookData(){
//     var httpReq = new XMLHttpRequest();
//     httpReq.open("GET", "new.txt", true);
//     httpReq.onreadystatechange = function(){
//         if(this.readyState ==4 && this.status == 200){
//             console.log(this.responseText);
//         // }else{
//         //     console.log("Somthing is wrong..");
//         } 
   
        
//     };
//     httpReq.send();
//     console.log("Data is fetched...");
// }