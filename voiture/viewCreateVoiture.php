<section class="section11"></section>
        <section id="section22">
        <form method="POST" action="index.php?controller=voiture&action=created" enctype="multipart/form-data" >
            <div class="page" id="page1">
              <hr/>
                <h1>Voiture</h1>
                <div>
                  <label for="immatriculation">Immatriculation*</label>
                  <input type="text" id="immatriculation" name="immatriculation" placeholder=""/>
              </div>
                <div>
                    <label for="marque">Marque*</label>
                    <input type="text" id="marque" name="marque" placeholder=""/>
                </div>

               <div> 
                  <label for="modele">Modèle* </label>
                  <input  name="modele" type="text" id="modele" required/> 
               </div>
             <div>
             <label for="annee">Année *</label>
             <input type="annee" id="annee" name="annee" pattern="[0-9]{4}"required>
             </div>
             <div>
                <label for="date_validation_tech">Date de validité du contrôle technique*</label>
                <input type="date" id="date_validation_tech" name="date_validation_tech" value=""placeholder="jj/mm/aaaa"/>
            </div>
            <div> 
                <label for="boitevitesse">Boite de vitesse*</label>
                <select name="boitevitesse" id="boitevitesse">
                <option value="m">Manuelle</option>
                <option value="a">Automatique</option>
                <option value="a">Séquentielle</option>
                </select> 
            </div>     
            <div>
                <label for="kilometrage">Kilométrage*</label>
                <input id="kilometrage" type="text"  name="kilometrage" placeholder="Ex:15000" required/>
            </div>
            <div>
                <label for="puissance_fiscale">Puissance Fiscale*</label>
                <input type="text" id="puissance_fiscale" name="puissance_fiscale" placeholder="" required/>
            </div>
            <div>
                     
                <label for="carburant">Carburant* </label>
                <input  name="carburant" type="text" id="carburant" placeholder="Ex: Essence" required/> 
             </div>

              <button type="button" class="Bouton1 btn-lg btn-outline-success btn-lg " id="bt">Suivant</button> <!--type button et pas submit car je vais passer à la page suivante , je vais pas envoyer toutes les informations que dans la dernière page!!!-->
            </div>
            <div class="page" id="page2">
              <hr/>
                <h1>Tarifs</h1>
                 <div>
                     <label for="prix_loc">Prix de base*</label>
                     <input type="text" id="prix_loc" name="prix_loc" placeholder="85dt/jour" required/>
                 </div>
                
                

                 
                   
                   <button type="button" class="Bouton2 btn-lg btn-outline-success btn-lg ">Précedente</button>
                   <button type="button" class="Bouton1 btn-lg btn-outline-success btn-lg">Suivant</button>
                </div>
                
                <div class="page" id="page3">
                  <hr/>
                    <h1>Photo</h1>
                    <input type="file" name="my_image">
                    <br/><br/><br/>

                    <div>
                    <label for="description">Description*</label>
                    <textarea name="description" id="description" cols="40" rows="3" required placeholder="Veuillez introduire vos exigences"></textarea>
                    </div>
                   
                    
                    <button type="button" class="Bouton2 btn-lg btn-outline-success btn-lg  ">Précédente</button>
                    <button type="submit" class="btn-lg btn-outline-success btn-lg">Terminer</button>
                       
            <div>


<script type="text/javascript">
/*Page Demander chauffeur*/


//1) récupérer les informations dont on a besoin 
// On va chercher les différents élements de notre page
const pages = document.querySelectorAll(".page")
const headerh1 =document.querySelector(".section11")
const nbPages=pages.length //nombre de pages de formulaire
 console.log(nbPages) 
//On attend le chargement de la page
let pageActive=1 //pour savoir quelle page je vais l'activer et ensuite je mets la classe active...
window.onload=()=>{
    //on affiche la 1ère page de formulaire
    document.querySelector(".page").style.display="initial"
    //on affiche les numéros des pages dans la section1
    //on parcourt la liste des pages
    pages.forEach((page,index)=> { /* synthaxe : données.foreach(donnée, index)*/
     // j'ai besoin de  l'index pour récupérer chaque page et activer après   
    //on crée l'élement "numéro de page(le rang avec num)"
    let element=document.createElement("div") // créqtion de l'élement virtuellement dans la mémoire
    element.classList.add("page-num")
    element.id="num" +(index + 1)
    if(pageActive===index + 1)
    {
        element.classList.add("active") //ajouter une classe que je l'appelle active
        //pour mettre la page active
    }
    element.innerHTML=index + 1
    console.log(element)
     headerh1.appendChild(element);
    
    
    
    })
}


//cette fonction fait avancer le formulaire d'une page
let boutons=document.querySelectorAll(".Bouton1") //pour chercher tous les bouttons(suivant) de la page
for(let buton of boutons){
    buton.addEventListener("click",pagesuivante) //Joindre un événement de clic au document. Lorsque l'utilisateur clique sur un boutton

}
//cette fonction retourner le formulaire d'une page en arrière
let btns=document.querySelectorAll(".Bouton2") //pour chercher tous les bouttons de la page
for(let bouton of btns){
    bouton.addEventListener("click",pageprecedente) //Joindre un événement de clic au document. Lorsque l'utilisateur clique sur un boutton

}
function pagesuivante()
{

//On masque toutes les pages
for(let page of pages){
    page.style.display="none"
}
//On affiche la page suivante
this.parentElement.nextElementSibling.style.display="initial"//this:c'est le boutton sur lequel j'ai cliqué
                      //ensuite je cherche son parent (la div parente)
                      //ensuite je descends dans la div suivante
//On désactive la page active
document.querySelector(".active").classList.remove("active")

//On incrémentre pageActive
pageActive++
//on active le nouveau numéro
document.querySelector("#num"+pageActive).classList.add("active")
}
function pageprecedente()
{

//On masque toutes les pages
for(let page of pages){
    page.style.display="none"
}
//On affiche la page précédente
this.parentElement.previousElementSibling.style.display="initial"//this:c'est le boutton sur lequel j'ai cliqué
                      //ensuite je cherche son parent (la div parente)
                      //ensuite je descends dans la div suivante
                      //On désactive la page active
document.querySelector(".active").classList.remove("active")

//On incrémentre pageActive
pageActive--
//on active le nouveau numéro
document.querySelector("#num"+pageActive).classList.add("active")
}
            
            </script>
        
                

       
              

        </form>
    </section>
    
     

  