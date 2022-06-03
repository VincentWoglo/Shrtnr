let GeneratedUrl = document.getElementById("GeneratedUrlLink")
let CopyGeneratedUrlBtn = document.getElementById("CopyUrlLink")


const CopyToClipBoard = ()=>{
    navigator.clipboard.writeText(GeneratedUrl.innerText)
    alert("Copied the text: " + GeneratedUrl.innerText);
}


CopyGeneratedUrlBtn.addEventListener("click", CopyToClipBoard)