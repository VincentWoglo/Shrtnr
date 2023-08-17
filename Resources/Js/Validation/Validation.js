let OriginalUrlInput = document.getElementById("UrlInput");
let GenerateUrlBtn = document.getElementById("GenerateUrlBtn");

//Use Regex to check if the Url has https://www. or http://www.

const CheckUrlPattern = (event)=>{
    OriginalUrlInput.addEventListener("keyup", (e)=>{
        const TargetedInputValue = e.target.value;
        const TargetedInput = e.target;
        const Regex = [
            "https://www.",
            "http://www.",
            "https://",
            "http://",
            "www."
        ]
        JoinRegex = new RegExp(Regex.join("|"), "i")
        JoinRegex.test(TargetedInputValue) === false ? TargetedInput.style.border="2px solid red"
        :TargetedInput.style.border="1px solid #d9d9d9"
    });
}

const SendDataToPHP = (event)=>{
    //event.preventDefault()
    let form = document.getElementById("GenerateUrlInputs");
    let data = new FormData();
    data.append("UrlInput", OriginalUrlInput.value)
    data.append("GenerateUrlBtn", GenerateUrlBtn.value)
        let Xhr = new XMLHttpRequest();
        let FileUrl = "http://localhost/Shrtnr/Controller/Validation/InputValidation.php"
        
        //let Vars = "UrlInput="+OriginalUrlInput.value+"&GenerateUrlBtn="+Clicked
        Xhr.open("POST", FileUrl, true);
        //Xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded", "application/json")
        Xhr.onload = ()=>{
            if(Xhr.readyState ==4 && Xhr.status == 200){
                let ReturnedData = JSON.parse(Xhr.response)
                console.log(ReturnedData.GeneratedSlug)
                console.log(ReturnedData)
                document.getElementById( "status" ).innerHTML = ReturnedData.Error
                ReturnedData.GeneratedSlug != null ? document.getElementById( "GeneratedUrlLink" ).innerHTML = "Lnkshortner.com/"+ReturnedData.GeneratedSlug 
                                                    : "Nothing"
            }
        }
        Xhr.send(data)

    /*Use Ajax to send info to php because we need to know if there is an error
    Prevent data from being submitted if there is an error with the URL
    */
}
const ValidateUrl = (e)=>{
    e.preventDefault()
    CheckUrlPattern()
    SendDataToPHP()
    //SendDataT
    /*Use Ajax to send info to php because we need to know if there is an error
    Prevent data from being submitted if there is an error with the URL
    */

}
//Do both front-end valdidation and back end validation
//On front-end only make the border red
//Get the text from the back-end with ajax

GenerateUrlBtn.addEventListener("click", ValidateUrl, false)