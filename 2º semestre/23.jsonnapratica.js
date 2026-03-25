const url = 'https://randomuser.me/api/?results=10';

async function getUsers(retorno){
    const resp = await fetch(url);
    const objeto = await resp.json();
    let itens = "";
    for(let pessoa of objeto.results){
        itens += `<li>${pessoa.name.first}${pessoa.name.last}<li>`;
    }
    document.getElementById(retorno).innerHTML=itens;
}