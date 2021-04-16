const presentationContainer = document.querySelector('.presentation_container');
const presentation = document.querySelector('.presentation');
const addField = document.querySelector('#add_field');

addField.addEventListener('click', e => {
	e.preventDefault();

	const presentationIndex = Array.from(document.querySelectorAll('.medicament_field')).length;
	const clone = presentation.cloneNode(true);
	console.log(clone);
	clone.insertAdjacentHTML('beforeend', '<div class="remove_field"><button href="#">Retirer</button></div>');


	let cloneHTML = `<div class="presentation">${clone.innerHTML}</div>`;

	cloneHTML = cloneHTML.replace(/compte_rendu_presentation_(\d+)_medicament/gim, `compte_rendu_presentation_${presentationIndex}_medicament`);

	cloneHTML = cloneHTML.replace(/compte_rendu\[presentation\]\[(\d+)\]\[medicament\]/gim, `compte_rendu[presentation][${presentationIndex}][medicament]`);

	cloneHTML = cloneHTML.replace(/compte_rendu_presentation_(\d+)_quantite_offerte/gim, `compte_rendu_presentation_${presentationIndex}_quantite_offerte`);

	cloneHTML = cloneHTML.replace(/compte_rendu\[presentation\]\[0\]\[quantite_offerte\]/gim, `compte_rendu[presentation][${presentationIndex}][quantite_offerte]`);

	presentationContainer.insertAdjacentHTML('beforeend', cloneHTML);

	const retirerField = document.querySelector('.medicament_field:last-child .remove_field');
	retirerField.addEventListener('click', e => {
		e.preventDefault();
		presentationContainer.removeChild(e.target.parentNode);
	});
});