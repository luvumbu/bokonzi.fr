class Html
{
    constructor(id_,model,id_parent)
    {
        this.id_ = id_ ;
        this.model=model; // Demande le type de  l'element exemple  DIV vous aurais un element div
        this.id_parent=id_parent;// Vous pourvez ajouter un element dans un autre element si il n'est pas definis il sera ajoute a la fin du body     
        var node = document.createElement(model); 
        
    if(this.id_parent==undefined) // Lors que vous n'avais pas definis la variable il fais cette action variable parent
    {
      node.setAttribute("id",id_)  ;   
      document.body.appendChild(node);  
       
    }
    else 
    {
      node.setAttribute("id",id_)  ;    
      document.getElementById(this.id_parent).appendChild(node);  
     } 
    }
    get setAtribute() 
    {
        return "oui" ; 
    }
     setAtribute(type,valeur) 
    {
        var c = document.getElementById(this.id_);    
        
        if(type=="text")
        {
            c.innerText=valeur ; 
        }
        else 
        {
           return c.setAttribute(type, valeur);
        }
    }
    getAtribute(valeur) 
    {
        switch (valeur) 
        {
                    case "className":
                    return  document.getElementById(this.id_).className;
                    break;
                    case "class":
                    return  document.getElementById(this.id_).className;
                    break;
                    case "placeholder":
                    return  document.getElementById(this.id_).placeholder;
                    break;
                    case "style":
                    return  document.getElementById(this.id_).style;
                    break;
                    case "value":
                    return  document.getElementById(this.id_).value;
                    break;
                    case "type":
                    return  document.getElementById(this.id_).type;
                    break;
                    case "title":
                    return  document.getElementById(this.id_).title;
                    break;
                    case "id":
                    return  document.getElementById(this.id_).id;                    
                    break;
                    case "text":
                    return  document.getElementById(this.id_).innerHTML;
        }
    }
}
// Création d'un div sans parent juste apres l'element body donc il est créer en dernier 
// exemple1 = new Html("input1","div"); 
// Création du déuxieme élement juste apres l'exemple1
// exemple1 = new Html("input1","input"); 
// exemple1.setAtribute("class","oui") ; 
// exemple2 = new Html("input2","input","input1"); 
// exemple2.setAtribute("class","oui-2") ; 


