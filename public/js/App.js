if (document.querySelector('#frm-login')){
	document.querySelector('#frm-login').addEventListener('submit', e =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm-login');
		let form = new FormData(data);
		xhr.open('POST', 'src/library/verify_session.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				if (xhr.responseText == 'false'){
					document.querySelector('.text-err').textContent = 'Ups! Los datos son incorrectos!';
					setTimeout(() =>{
						document.querySelector('.err').classList.toggle('d-block');
					}, 3000);
					document.querySelector('.err').classList.toggle('d-block');
					document.querySelector('#us_l').value = '';
					document.querySelector('#pdw_l').value = '';
				}else if (xhr.responseText == 'error'){
					document.querySelector('.text-err').textContent = 'Ups! Complete los datos!';
					setTimeout(() =>{
						document.querySelector('.err').classList.toggle('d-block');
					}, 3000);
					document.querySelector('.err').classList.toggle('d-block');
					document.querySelector('#us_l').value = '';
					document.querySelector('#pdw_l').value = '';
				}else{
					document.querySelector('#us_l').value = '';
					document.querySelector('#pdw_l').value = '';
					location.reload();
				}
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		e.preventDefault();	
	});
}
if (document.querySelector('#frm-register')){
	document.querySelector('#frm-register').addEventListener('submit', e =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm-register');
		let form = new FormData(data);
		xhr.open('POST', 'src/library/verify_session.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				if (xhr.responseText == 'false'){
					document.querySelector('.text-err').textContent = 'Ups! Este usuario ya existe!';
					setTimeout(() =>{
						document.querySelector('.err').classList.toggle('d-block');
					}, 3000);
					document.querySelector('.err').classList.toggle('d-block');
					document.querySelector('#us_r').value = '';
					document.querySelector('#pdw_r').value = '';
					document.querySelector('#pdw_r_r').value = '';
					document.querySelector('#f_d').value = '';
					document.querySelector('#l_n').value = '';
					document.querySelector('#st').value = '';
					document.querySelector('#ht').value = '';
					document.querySelector('#cp').value = '';
					document.querySelector('#ct').value = '';
					document.querySelector('#tl').value = '';
					document.querySelector('#dn').value = '';
					document.querySelector('#cy').value = '';
				}else if(xhr.responseText == 'error'){
					document.querySelector('.text-err').textContent = 'Ups! Complete los datos!';
					setTimeout(() =>{
						document.querySelector('.err').classList.toggle('d-block');
					}, 3000);
					document.querySelector('.err').classList.toggle('d-block');
					document.querySelector('#us_r').value = '';
					document.querySelector('#pdw_r').value = '';
					document.querySelector('#pdw_r_r').value = '';
					document.querySelector('#f_d').value = '';
					document.querySelector('#l_n').value = '';
					document.querySelector('#st').value = '';
					document.querySelector('#ht').value = '';
					document.querySelector('#cp').value = '';
					document.querySelector('#ct').value = '';
					document.querySelector('#tl').value = '';
					document.querySelector('#dn').value = '';
					document.querySelector('#cy').value = '';
				}else if (xhr.responseText == 'str_false'){
					document.querySelector('.text-err').textContent = 'Ups! Mínimo 3 carácteres!';
					setTimeout(() =>{
						document.querySelector('.err').classList.toggle('d-block');
					}, 3000);
					document.querySelector('.err').classList.toggle('d-block');
					document.querySelector('#us_r').value = '';
					document.querySelector('#pdw_r').value = '';
					document.querySelector('#pdw_r_r').value = '';
					document.querySelector('#f_d').value = '';
					document.querySelector('#l_n').value = '';
					document.querySelector('#st').value = '';
					document.querySelector('#ht').value = '';
					document.querySelector('#cp').value = '';
					document.querySelector('#ct').value = '';
					document.querySelector('#tl').value = '';
					document.querySelector('#dn').value = '';
					document.querySelector('#cy').value = '';	
				}else if(xhr.responseText == 'err_simbol'){
					document.querySelector('.text-err').textContent = `Ups! No se permite (!"#$%&'()*+,-./, etc.)!`;
					setTimeout(() =>{
						document.querySelector('.err').classList.toggle('d-block');
					}, 3000);
					document.querySelector('.err').classList.toggle('d-block');
					document.querySelector('#us_r').value = '';
					document.querySelector('#pdw_r').value = '';
					document.querySelector('#pdw_r_r').value = '';
					document.querySelector('#f_d').value = '';
					document.querySelector('#l_n').value = '';
					document.querySelector('#st').value = '';
					document.querySelector('#ht').value = '';
					document.querySelector('#cp').value = '';
					document.querySelector('#ct').value = '';
					document.querySelector('#tl').value = '';
					document.querySelector('#dn').value = '';
					document.querySelector('#cy').value = '';
				}else{
					document.querySelector('#us_r').value = '';
					document.querySelector('#pdw_r').value = '';
					document.querySelector('#pdw_r_r').value = '';
					document.querySelector('#f_d').value = '';
					document.querySelector('#l_n').value = '';
					document.querySelector('#st').value = '';
					document.querySelector('#ht').value = '';
					document.querySelector('#cp').value = '';
					document.querySelector('#ct').value = '';
					document.querySelector('#tl').value = '';
					document.querySelector('#dn').value = '';
					document.querySelector('#cy').value = '';
				}
				console.log(xhr.responseText)
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		e.preventDefault();	
	});
}
if (document.querySelector('.btn-zoom-prod')){
	document.querySelector('.btn-zoom-prod').addEventListener('click', () =>{
		document.querySelector('.cont-img-prod-open').classList.toggle('zoom-prod-open');
		document.querySelector('.desc-prod-open').classList.toggle('d-none');
		document.querySelector('.title-prod-open').classList.toggle('d-none');
		document.querySelector('.methods-buy').classList.toggle('d-none');
		document.querySelector('.box-shadow').classList.toggle('d-block');
		document.querySelector('html').classList.toggle('scroll-none');
	});
}	
let shared = e =>{
		document.querySelector(`.shared-link-list-${e.value}`).value = `${location.origin}/proyecto%20bikeshop${e.id}`;
		document.querySelector(`.shared-link-list-${e.value}`).classList.toggle('d-block');
		document.querySelector(`.shared-link-list-${e.value}`).select();
	  	document.execCommand("copy");
		document.querySelector(`.shared-link-list-${e.value}`).classList.toggle('d-block');
	  	setTimeout(() =>{
	  		document.querySelector(`.noti_copy-${e.value}`).classList.toggle('d-block');
	  	}, 1000);
	  	document.querySelector(`.noti_copy-${e.value}`).classList.toggle('d-block');
};
const shared_open_note = e =>{
	document.querySelector(`.shared-link-list-${e.value}`).value = window.location;
	document.querySelector(`.shared-link-list-${e.value}`).classList.toggle('d-block');
	document.querySelector(`.shared-link-list-${e.value}`).select();
  	document.execCommand("copy");
	document.querySelector(`.shared-link-list-${e.value}`).classList.toggle('d-block');
  	setTimeout(() =>{
  		document.querySelector(`.noti_copy-${e.value}`).classList.toggle('d-block');
  	}, 1000);
  	document.querySelector(`.noti_copy-${e.value}`).classList.toggle('d-block');
};
if(document.querySelector('.title-shared')){
	document.querySelector('.shared-link').value = window.location;
	document.querySelector('.title-shared').addEventListener('click', () =>{
		document.querySelector('.shared-link').select();
	  	document.execCommand("copy");
	});
}
if (document.querySelector('.btn-query')){
	document.querySelector('.btn-query').addEventListener('click', () =>{
		document.querySelector('.query').classList.toggle('d-block');
	});
}	
let q_product = () =>{
	let xhr = new XMLHttpRequest();
	xhr.open('POST', 'src/library/q_product.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200){
			document.querySelector('.content-product').innerHTML = '';
			document.querySelector('.content-product').insertAdjacentHTML('beforeend', xhr.responseText);
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();	
};	
if (document.querySelector('.content-product')){
	q_product();
}
if (document.querySelector('#form-control')){
	document.querySelector('#form-control').addEventListener('input', e =>{
		let xhr = new XMLHttpRequest();
		let form = new FormData();
		form.append('search', `${document.querySelector('#form-control').value}`);
		xhr.open('POST', 'src/library/q_search_product.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				if(document.querySelector('.result_none')){
					document.querySelector('.content-product').innerHTML = xhr.responseText;
				}else{
					document.querySelector('.content-product').innerHTML = '';
					document.querySelector('.content-product').insertAdjacentHTML('beforeend', xhr.responseText);
				}
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		e.preventDefault();	
	});
}	
if (document.querySelector('.frm-search')){
	document.querySelector('.nav').style = `margin-right: 0;`;
}else{
	document.querySelector('.nav').style = `margin-right: 13.46vw;`;
}	
document.querySelector('.lema').style = `opacity: 1;`;
document.querySelector('.logo').style = `opacity: 1;`;
if (document.querySelector('.content-product')){
	document.querySelector('.content-product').style = `opacity: 1;`;
}
if (document.querySelector('.cont-img-prod-open')){
	document.querySelector('.cont-img-prod-open').classList.add('img-open');
}
if (document.querySelector('.btn-insert-product')){
	document.querySelector('.btn-insert-product').addEventListener('click', () =>{
		document.querySelector('.content-frm-insert-product').classList.add('content-frm-insert-product-open');
		document.querySelector('.box-shadow').classList.add('d-block');
	});
}
if (document.querySelector('.btn-insert-note')){
	document.querySelector('.btn-insert-note').addEventListener('click', () =>{
		document.querySelector('.content-frm-insert-publish').classList.add('content-frm-insert-publish-open');
		document.querySelector('.box-shadow').classList.add('d-block');
	});
}
if (document.querySelector('.btn-back-insert-product')){
	document.querySelector('.btn-back-insert-product').addEventListener('click', () =>{
		document.querySelector('.content-frm-insert-product').classList.remove('content-frm-insert-product-open');
		document.querySelector('.box-shadow').classList.remove('d-block');
	});
}
if (document.querySelector('.btn-back-insert-publish')){
	document.querySelector('.btn-back-insert-publish').addEventListener('click', () =>{
		document.querySelector('.content-frm-insert-publish').classList.remove('content-frm-insert-publish-open');
		document.querySelector('.box-shadow').classList.remove('d-block');
	});
}		
if (document.querySelector('#frm-insert-product')){
	document.querySelector('#frm-insert-product').addEventListener('submit', e =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm-insert-product');
		let form = new FormData(data);
		xhr.open('POST', 'src/library/insert_product.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				document.querySelector('.content-frm-insert-product').classList.remove('content-frm-insert-product-open');
				document.querySelector('.box-shadow').classList.remove('d-block');
				document.querySelector('#description').value = 'My detailing description';
				document.querySelector('#bu').value = '';
				document.querySelector('#pr').value = '';
				document.querySelector('#im').value = '';
				document.querySelector('#im_2').value = '';
				document.querySelector('#im_3').value = '';
				document.querySelector('#ti').value = '';
				q_product();
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		e.preventDefault();	
	});
}
let q_note_blog = () =>{
	let xhr = new XMLHttpRequest();
	xhr.open('POST', 'src/library/q_note_blog.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200){
			document.querySelector('.contain-public').innerHTML = '';
			document.querySelector('.contain-public').insertAdjacentHTML('beforeend', xhr.responseText);
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();	
};		
if (document.querySelector('#frm-insert-publish')){
	document.querySelector('#frm-insert-publish').addEventListener('submit', e =>{
		let xhr = new XMLHttpRequest();
		const data = document.querySelector('#frm-insert-publish');
		let form = new FormData(data);
		xhr.open('POST', 'src/library/insert_publish.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				document.querySelector('.content-frm-insert-publish').classList.remove('content-frm-insert-publish-open');
				document.querySelector('.box-shadow').classList.remove('d-block');
				document.querySelector('#text_content').value = 'My text content (Required)';
				document.querySelector('#tr').value = '';
				document.querySelector('#ti').value = '';
				document.querySelector('#im1').value = '';
				document.querySelector('#im2').value = '';
				document.querySelector('#im3').value = '';
				q_note_blog();			
				console.log(xhr.responseText)
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
		e.preventDefault();	
	});
}
let like = e =>{
	let xhr = new XMLHttpRequest();
	let form = new FormData();
	form.append('id_product', e.value);
	xhr.open('POST', 'src/library/like_verify.php', true);
	xhr.addEventListener('load', () => {
		if (xhr.status === 200){
			document.querySelector(`.cont-num-like-${e.value}`).innerHTML = '';
			document.querySelector(`.cont-num-like-${e.value}`).innerHTML = xhr.responseText;
			q_product();
		}else{
			console.log(`error en la petición: ${xhr.status}`);
		}
	});
	xhr.send(form);
}
if (document.querySelector('.contain-public')){
	q_note_blog();
}if (document.querySelector('.title-prod-open')){
	let title_head_prod = document.querySelector('.title-prod-open').innerHTML.trim();
	title_head_prod = title_head_prod.replace(/\b[a-z]/g,c=>c.toUpperCase());
	document.title = title_head_prod;
	document.querySelector('meta[name="description"]').content = document.querySelector('.desc-prod-open p').innerHTML.trim();
}if (document.querySelector('.public-box')){
	let title_head_prod = document.querySelector('.title-public').innerHTML.trim();
	title_head_prod = title_head_prod.replace(/\b[a-z]/g,c=>c.toUpperCase());
	document.title = title_head_prod;
	document.querySelector('meta[name="description"]').content = document.querySelector('.text-public').innerHTML.trim();
}if (document.querySelector('.select-img')){
	document.querySelector('.select-1').addEventListener('click', () =>{
		document.querySelector('.cont-img-prod-open').style = `background-image: url("${document.querySelector('.select-1').getAttribute('value')}");`;
	});
	document.querySelector('.select-2').addEventListener('click', () =>{
		document.querySelector('.cont-img-prod-open').style = `background-image: url("${document.querySelector('.select-2').getAttribute('value')}");`;
	});
	document.querySelector('.select-3').addEventListener('click', () =>{
		document.querySelector('.cont-img-prod-open').style = `background-image: url("${document.querySelector('.select-3').getAttribute('value')}");`;
	});
}
if(document.querySelector('.content-product')){
	let size = window.innerHeight - 700;
	let v_l = 12;
	let request_query = true;
	document.addEventListener('scroll', () =>{
		if (size < window.scrollY && request_query){
			setTimeout(() =>{
				let xhr = new XMLHttpRequest();
				let form = new FormData();
				form.append('value_limit', v_l);
				xhr.open('POST', 'src/library/q_product.php', true);
				xhr.addEventListener('load', () => {
					if (xhr.status === 200){
						if(xhr.responseText != 'false'){
							document.querySelector('.content-product').innerHTML = '';
							document.querySelector('.content-product').insertAdjacentHTML('beforeend', xhr.responseText);
							size += size;
							v_l += 12;
						}else{
							request_query = false;
						}	
					}else{
						console.log(`error en la petición: ${xhr.status}`);
					}
				});
				xhr.send(form);
			}, 1000);	
		}
	});			
}
let ejecutar  = () =>{		
	if(('webkitSpeechRecognition') in window){
		for(let i = event.resultIndex; i < event.results.length; i++){
			document.querySelector('#form-control').value = event.results[i][0].transcript;
		}
		let xhr = new XMLHttpRequest();
		let form = new FormData();
		form.append('search', `${document.querySelector('#form-control').value}`);
		xhr.open('POST', 'src/library/q_search_product.php', true);
		xhr.addEventListener('load', () => {
			if (xhr.status === 200){
				if(document.querySelector('.result_none')){
					document.querySelector('.content-product').innerHTML = xhr.responseText;
				}else{
					document.querySelector('.content-product').innerHTML = '';
					document.querySelector('.content-product').insertAdjacentHTML('beforeend', xhr.responseText);
				}
			}else{
				console.log(`error en la petición: ${xhr.status}`);
			}
		});
		xhr.send(form);
	}else{
		alert('Tu navegador no acepta reconocimiento de voz.');
	}
};
let rec;	
if (('webkitSpeechRecognition') in window){
	rec = new webkitSpeechRecognition();
	rec.lang = 'es-Ar';
	rec.continuous = true;
	rec.interim = true;
	rec.addEventListener("result", ejecutar);
}
document.querySelector('.assistant-voice').addEventListener('mousedown', () =>{
	document.querySelector('#form-control').classList.toggle('bg-warning');
	document.querySelector('#sound-voice').play();
	rec.start();
});
document.querySelector('.assistant-voice').addEventListener('mouseup', () =>{
	document.querySelector('#form-control').classList.toggle('bg-warning');
	document.querySelector('#sound-voice-off').play();
	rec.stop();
});
let format = (input) =>{
	let num = input.value.replace(/\./g,'');
	if(!isNaN(num)){
		num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		num = num.split('').reverse().join('').replace(/^[\.]/,'');
		input.value = num;
	}else{
		alert('Solo se permiten numeros');
		input.value = input.value.replace(/[^\d\.]*/g,'');
	}
};
if (document.querySelector('.content-frm-photo-profile')){
    if(document.querySelector('.user-profile-photo')){
        document.querySelector('.user-profile-photo').addEventListener('click', () =>{
            document.querySelector('.content-frm-photo-profile').classList.add('d-block');
            document.querySelector('.content-frm-photo-profile').classList.remove('d-none');
            document.querySelector('.box-shadow').classList.add('d-block');
            document.querySelector('.box-shadow').classList.remove('d-none');
            document.querySelector('html').classList.add('scroll-none');
        });
    }    
    if(document.querySelector('.cancel')){
        document.querySelector('.cancel').addEventListener('click', () =>{
            document.querySelector('.content-frm-photo-profile').classList.add('d-none');
            document.querySelector('.content-frm-photo-profile').classList.remove('d-block');
            document.querySelector('.box-shadow').classList.add('d-none');
            document.querySelector('.box-shadow').classList.remove('d-block');
            document.querySelector('html').classList.remove('scroll-none');
        });
    }    
    if(document.querySelector('#frm-photo-profile')){
        document.querySelector('#frm-photo-profile').addEventListener('submit', e =>{
            let xhr = new XMLHttpRequest();
            const data = document.querySelector('#frm-photo-profile');
            let form = new FormData(data);
            xhr.open('POST', 'src/library/in_profile_photo.php', true);
            xhr.addEventListener('load', () =>{
                if (xhr.status == 200){
                    document.querySelector('#prof_img').value = '';
                    document.querySelector('.user-profile-photo').style = `
                    background-image: url('${xhr.responseText}');`;
                    document.querySelector('.circle-content-photo').style = `
                        background-image: url('${xhr.responseText}');`;	
                    document.querySelector('.content-frm-photo-profile').classList.add('d-none');
                    document.querySelector('.content-frm-photo-profile').classList.remove('d-block');
                    document.querySelector('.box-shadow').classList.add('d-none');
                    document.querySelector('.box-shadow').classList.remove('d-block');
                    document.querySelector('html').classList.remove('scroll-none');
                }else{
                    console.log(`Error en la petición: ${xhr.status}`);
                }
            });
            xhr.send(form);
            e.preventDefault();
        });
    }    
}
const profile_photo = () =>{
	let xhr = new XMLHttpRequest();
	xhr.open('POST', 'src/library/q_profile_photo.php', true);
	xhr.addEventListener('load', () =>{
		if (xhr.status === 200){
			document.querySelector('.user-profile-photo').style = `
				background-image: url('${xhr.responseText}');`;
			document.querySelector('.circle-content-photo').style = `
				background-image: url('${xhr.responseText}');`;	
		}else{
			console.log(`Error en la petición: ${xhr.status}`);
		}
	});
	xhr.send();
};
if (document.querySelector('.user-profile-photo')){
	profile_photo();
}
if (document.querySelector('.cont-img-profile-prod')){
	document.querySelector('.cont-img-profile-prod').addEventListener('click', () =>{
		document.querySelector('.cont-img-profile-prod').classList.toggle('cont-img-profile-prod-open');
	});
}
console.log(`%cEste sector es para desarrolladores,
 si usted no es desarrallor y le dijieron que pegue algún texto aquí, no lo haga",
 "color: #FFF; background-color: red; font-size: 1.5em;`)