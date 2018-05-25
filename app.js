(function(){
  let chooseSuggestion=suggest=>{
    inputSearch.value=previousValue=suggest;
    results.innerHTML='';
    results.style.display='none';
    focusedSuggest=-1;
    inputSearch.focus();
  };
  let getResponses=(text)=>{
    results.innerHTML='';
    let divs='';
    if(text && text.length>0 &&text[0]!=""){
      results.style.display='block';
      for(let i=0,c=text.length;i<c;i++){
        divs+=`<div class="child">${text[i]}</div>`;
      }
      results.innerHTML=divs;
      let allSuggestions=document.querySelectorAll('.child');
      if(allSuggestions.length>=1){
        for(let l=0,c=allSuggestions.length;l<c;l++){
          let allSuggestion=allSuggestions[l];
          allSuggestion.addEventListener('click',function(){
            chooseSuggestion(allSuggestion.innerText);
          },false);
        }
      }
    }else{
      results.style.display='none';
    };
  };
let autoComplete=(elem) =>{
  let xhr=new XMLHttpRequest();
  let textEntered=encodeURIComponent(elem);
  xhr.open('GET','serveur.php?search='+textEntered);
  xhr.onload=()=>{
    let result=xhr.responseText.split('|');
    if(result.length>0){
      getResponses(result);
    }
  };
  xhr.send();
  return xhr;
};
let inputSearch=document.getElementById('search');
let results=document.getElementById('results');
let focusedSuggest=-1;
let previousValue=inputSearch.value,previousReq;
inputSearch.addEventListener('keyup',e=>{
  e.preventDefault();
  var childs=results.getElementsByTagName('div');
  if(e.keyCode==38&&focusedSuggest>-1){
    childs[focusedSuggest--].setAttribute('id','');
    if(focusedSuggest>-1){
      childs[focusedSuggest].setAttribute('id','focused_result');
    }
  }else if(e.keyCode==40&&focusedSuggest<childs.length-1){
    if(focusedSuggest>-1){
      childs[focusedSuggest].setAttribute('id','');
    }
    childs[++focusedSuggest].setAttribute('id','focused_result');

  }
  else if(e.keyCode==13&&focusedSuggest>-1){
    e.preventDefault();
    chooseSuggestion(childs[focusedSuggest].innerHTML);
  }
  else if (previousValue!=inputSearch.value) {
    previousValue=inputSearch.value;
    if(previousReq&& previousReq.readyState<4){
      previousReq.abort();
    }
    previousReq=autoComplete(previousValue);
    focusedSuggest=-1;
  }
},false);
})();
