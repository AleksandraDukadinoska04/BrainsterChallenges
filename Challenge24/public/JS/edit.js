const editButtons = document.querySelectorAll('.edit');
const cancelButtons = document.querySelectorAll('.cancel');


editButtons.forEach(e => {
    e.addEventListener('click', () => {
        const parentOfTheButton = e.parentElement;
        const parentOfTheParent = parentOfTheButton.parentElement;
        parentOfTheParent.style.display = 'none';
        parentOfTheParent.nextElementSibling.style.display = 'flex';
        
    })

})

cancelButtons.forEach(e => {
    e.addEventListener('click', () => {
        const parentOfTheButton = e.parentElement;
        const parentOfTheParent = parentOfTheButton.parentElement;
        const formDIv = parentOfTheParent.parentElement
        formDIv.style.display = 'none';
        formDIv.previousElementSibling.style.display = 'flex';
        
    })

})
