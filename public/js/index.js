// //SIDEBAR
// const menuItems = document.querySelectorAll('.menu-item');

// //MESSAGES
// const messagesNotification = document.querySelector('#messages-notification');
// const messages = document.querySelector('.messages');
// const message = messages.querySelectorAll('.message');
// const messageSearch = document.querySelector('#message-search');

// //THEME
//     const theme = document.querySelector('#theme');
//     const themeModal = document.querySelector('.customize-theme');
//     const fontSizes = document.querySelectorAll('.choose-size span');
//     var root = document.querySelector(':root');
//     const colorPalette = document.querySelectorAll('.choose-color span');
//     const Bg1 = document.querySelector('.bg-1');
//     const Bg2 = document.querySelector('.bg-2');
//     const Bg3 = document.querySelector('.bg-3');

// //remove active class from all menu item
// const changeActiveItem = () =>{
//     menuItems.forEach(item => {
//         item.classList.remove('active');
//     })
// }

// menuItems.forEach(item =>{
//     item.addEventListener('click', () =>{
//         changeActiveItem();
//         item.classList.add('active');
//         if(item.id != 'notifications'){
//             document.querySelector('.notifications-popup').style.display = 'none';
//         }else{
//             document.querySelector('.notifications-popup').style.display = 'block';
//             document.querySelector('#notifications .notification-count').style.display = 'none';
//         }
//     })
// })

// //===================MESSAGES============================
// //search chats
// const searchMessage =  () => {
//     const val = messageSearch.value.toLowerCase();
//     message.forEach(user => {
//         let name = user.querySelector('h5').textContent.toLowerCase();
//         if(name.indexOf(val) != -1){
//             user.style.display = 'flex';
//         }else{
//             user.style.display = 'none';
//         }
//     })
// }

// //search chat
// messageSearch.addEventListener('keyup', searchMessage);

// //hightlight messages car when messages menu item is clicked
// messagesNotification.addEventListener('click', () => {
//     messages.style.boxShadow = '0 0 1rem var(--color-primary)';
//     messagesNotification.querySelector('.notification-count').style.display = 'none';
//     setTimeout(() =>{
//         messages.style.boxShadow = 'none';
//     }, 2000);
// })

// //THEME/ DISPLAY CUSTOMAZITION

// // open modal
// const openThemeModal = ()=> {
//     themeModal.style.display = 'grid';
// }

// //closes modal
// const closeThemeModal = (e) =>{
//     if(e.target.classList.contains('customize-theme')){
//         themeModal.style.display = 'none';
//     }
// }

// //closes modal
// themeModal.addEventListener('click', closeThemeModal);

// theme.addEventListener('click', openThemeModal);

// //====================FONTS========================

// //remove active class from span or font size selectors
// const removeSizeSelector = () =>{
//     fontSizes.forEach(size => {
//         size.classList.remove('active');
//     })
// }
// fontSizes.forEach(size => {

//     size.addEventListener('click', () => {
//         removeSizeSelector();
//         let fontSize;
//         size.classList.toggle('active');

//         if(size.classList.contains('font-size-1')){
//             fontSize = '10px';
//             root.style.setProperty('--sticky-top-left','5.4rem');
//             root.style.setProperty('--sticky-top-right','5.4rem');
//         }else if(size.classList.contains('font-size-2')){
//             fontSize = '13px';
//             root.style.setProperty('--sticky-top-left','5.4rem');
//             root.style.setProperty('--sticky-top-right','-7rem');
//         }else if(size.classList.contains('font-size-3')){
//             fontSize = '16px';
//             root.style.setProperty('--sticky-top-left','-2rem');
//             root.style.setProperty('--sticky-top-right','-17rem');
//         }else if(size.classList.contains('font-size-4')){
//             fontSize = '19px';
//             root.style.setProperty('--sticky-top-left','-5rem');
//             root.style.setProperty('--sticky-top-right','-25rem');
//         }else if(size.classList.contains('font-size-5')){
//             fontSize = '22px';
//             root.style.setProperty('--sticky-top-left','-12rem');
//             root.style.setProperty('--sticky-top-right','-35rem');
//         }

//         // change font size of the root html element
//     document.querySelector('html').style.fontSize = fontSize;
//     })

// })

// //remove active class from color
// const changeActiveColorClass = () =>{
//     colorPalette.forEach(colorPicker => {
//         colorPicker.classList.remove('active');
//     })
// }

// //change primary color
// colorPalette.forEach(color => {
//     color.addEventListener('click', () => {
//         let primary;
//         //remove active class from color
//         changeActiveColorClass();

//         if(color.classList.contains('color-1')){
//             primaryHue = 252;
//         }else if(color.classList.contains('color-2')){
//             primaryHue = 52;
//         }else if(color.classList.contains('color-3')){
//             primaryHue = 352;
//         }else if(color.classList.contains('color-4')){
//             primaryHue = 152;
//         }else if(color.classList.contains('color-5')){
//             primaryHue = 202;
//         }
//         color.classList.add('active');

//         root.style.setProperty('--primary-color-hue', primaryHue);
//     })
// })

// //theme BG values
// let lightColorLightness;
// let whiteColorLightness;
// let darkColorLightness;

// // change bg color
// const changeBG = () => {
//     root.style.setProperty('--light-color-lightness', lightColorLightness);
//     root.style.setProperty('--white-color-lightness', whiteColorLightness);
//     root.style.setProperty('--dark-color-lightness', darkColorLightness);

// }

// Bg1.addEventListener('click', () => {
//     //add active class
//     Bg1.classList.add('active');
//     //remove active class from the other
//     Bg2.classList.remove('active');
//     Bg3.classList.remove('active');
//     // remove customized changes from local storage
//     changeBG();
//     // window.location.reload();
// })

// Bg2.addEventListener('click', () => {
//     darkColorLightness = '95%';
//     whiteColorLightness = '20%';
//     lightColorLightness = '15%';

//     //add active class
//     Bg2.classList.add('active');
//     //remove active class from the other
//     Bg1.classList.remove('active');
//     Bg3.classList.remove('active');
//     changeBG();
//     // window.location.reload();
// })

// Bg3.addEventListener('click', () => {
//     darkColorLightness = '95%';
//     whiteColorLightness = '10%';
//     lightColorLightness = '0%';

//     //add active class
//     Bg3.classList.add('active');
//     //remove active class from the other
//     Bg1.classList.remove('active');
//     Bg2.classList.remove('active');
//     changeBG();
//     // window.location.reload();
// })

//dropdown menu
/* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
function dropDown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches(".dropbtn")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
        }
    }
};

// Like button
// const btnlike = document.querySelector('.like-button');
// function likePost(){
//     if (btnlike.style.color == "red") {
//         // btnlike.classList.remove('bi-heart');
//         // btnlike.classList.add('bi-heart-fill');
//         btnlike.style.color = "white"
//     }
//     else{
//         btnlike.style.color = "red"

//     }
// }
// like

const createModal = document.querySelector(".create-modal");
const create = document.querySelector("#create-btn");
const openCreateModal = () => {
    createModal.style.display = "block";
};
//closes modal
const closeCreateModal = (e) => {
    if (e.target.classList.contains("create-modal")) {
        createModal.style.display = "none";
    }
};
//closes modal
createModal.addEventListener("click", closeCreateModal);
create.addEventListener("click", openCreateModal);

function comment(id) {
    // document.getElementsByClassName("comments").styles.display = "block";
    var cmt = document.getElementsByClassName("comments");
    // console.log(id);
    // console.log(cmt[id])

    // for (var i = 0; i < cmt.length; i += 1) {
    //     cmt[i].style.display = "block";
    // }
    cmt[id-1].style.display = "block";

}
