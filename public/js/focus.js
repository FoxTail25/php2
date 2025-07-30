// снимаем фокус с кнопок, при нажатии на них
let btnModalClose1 = document.querySelector('#btn-modal-close-1');
let btnModalClose2 = document.querySelector('#btn-modal-close-2');
let htmlEl = document.querySelector('html');

let btnArr = [btnModalClose1, btnModalClose2];

for(let btn of btnArr) {
	btn.addEventListener("click", function(){
		this.blur()
		htmlEl.focus();
	})
}