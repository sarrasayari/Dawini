const button1 = document.querySelector(".button1");
const btnDrop = document.querySelector(".bloc-top");


let toggleIndex = 0;

btnDrop.addEventListener('click', () => {

    // console.log(button1.scrollHeight);

    if(toggleIndex === 0){
        button1.style.height = `${button1.scrollHeight}px`;
        toggleIndex++;
    } else {
        button1.style.height = `${btnDrop.scrollHeight}px`;
        toggleIndex--;
    }

})
