

const show = document.getElementById("show");

    function appendOnClick(input){
        show.value += input;
    }

    function clearAll(){
        show.value = "";
    }

    function calculate(){
        try{
            show.value = eval(show.value);
        }
        catch(error){
            show.value = "error";
        }
    }