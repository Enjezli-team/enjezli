/**----------------------
 *    start js Search
 *------------------------**/

//  var search=document.querySelectorAll(".search");
//  var cards=document.querySelectorAll(".personal_info_container");
//  var skills=document.querySelectorAll(".skills");
//  search.forEach(s_input=>{
//      s_input.onkeyup=function(){
//          if(s_input.value!=""){

//          if(isArabic(s_input.value)){
//          for(let i=0;i < skills.length;i++)
//          // if(skills[i].innerHTML.toUpperCase().indexOf(s_input.value.toUpperCase())==-1){

//          if(skills[i].innerHTML.indexOf(s_input.value)==-1){
//          console.log( skills[i].innerHTML);
//          cards[i].style.display="none" ;
//          }
//          else{
//          cards[i].style.display="block";
//          }
//          }
//          else{
//              for(let i=0;i < skills.length;i++)
//          if(skills[i].innerHTML.toUpperCase().indexOf(s_input.value.toUpperCase())==-1){

//          console.log( skills[i].innerHTML);
//          cards[i].style.display="none" ;
//          }
//          else{
//          cards[i].style.display="block";
//          }
//          }
//           }

//          }

//  });

//  function isArabic(text) {
//      var pattern = /[\u0600-\u06FF\u0750-\u077F]/;
//      result = pattern.test(text);
//      return result;
//  }
/**----------------------
 *    end js Search
 *------------------------**/

/**----------------------
 * @returns {HTMLElement}
 *------------------------**/
const el = ($elemnt) => document.querySelector($elemnt);

const log = (...param) => console.log(...param);

var search = el(".search-input");
let token = document.head.querySelector("[name=csrf-token]").content;

var project_container = el(".row");

search.addEventListener("keyup", function (event) {
    var search_key = search.value;
    console.log("search_key", search_key);
    url = "/search";
    //    event.preventDefault();
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            search: search_key,
        }),
    })
        .then(async (data) => {
            let res = await data.json();
            console.log(res);
            console.log(res.data.map((item) => item.status));

            let list = res.data
                .map((item) => renderSearch(item))
                .reduce((prev, current) => prev + current, "");

            // console.log(list);

            // renderSearch(item);

            project_container.innerHTML = list;
            // var fetch_data= data.json().data;
            // console.log(fetch_data.data);
        })
        .catch(function (error) {
            console.log(error);
        });
});

function renderSearch(item) {
    const itemStatus = () => {
        let status = "<span>الحالة </span>";
        if (item.status === 0) {
            status +=
                ' <span class="text-success text-sm mr-2"> مفتوح </span> <span class="text-error text-sm mr-2"> بإنتظار الموافقة </span>';

            return status;
        }

        if (item.status === 2) {
            status += '<span class="text-success text-sm mr-2"> مغلق </span>';

            return status;
        }

        return "";
    };

    let html = `
     <div class="col-md-4 col-sm-12 cards_contianer ">
     <a class='title' href="projects/${item.id}">
     <div class="personal_info_container myworks" style="width: auto;height:380px">
         <div class="container_card">
             <header class="">
                 <h2>${item.title}</h2>
                 <div>
                     <div class="flex">
                         <span>
                             <ion-icon name="person-outline"></ion-icon>
                         </span>
                         <h5>${item.sal_created_by.name}  </h5>
                     </div>
                     <div class="flex">
                         <span>
                             <ion-icon name="time-outline"></ion-icon>
                         </span>
                         <span class="aut_pub">${item.created_at}</span>
 
                     </div>
                 </div>
 
                 <div>
                 ${item.description.substring(0, 80)}...
 
                 </div>
                 <div class="liks_shows">
                     <ul>
                         <li>
                             <a href="" class="">
                                 <span> الفترة</span>
                                 <span>${item.duration}يوم</span>
                             </a>
                         </li>
                         <li>
                             <a href="" class="">
                                 <span> السعر :</span>
                                 <span>${item.price}$</span>
                             </a>
                         </li>
                         <li>
 
                         <li>
                             <a href="" class="">
                                 <span>:العروض</span>
                                 <span>${item.sal_offers.length}</span>
                             </a>
                         </li>
 
                         <div class='skills '>
                             ${item.sal_skills_by
                                 .map(
                                     (skill) =>
                                         `<div>${skill.sal_skill.title}</div>`
                                 )
                                 .reduce((prev, current) => prev + current, "")}
                         </div>
 
                         <a>
 
                            ${itemStatus()}
                         </a>
                         </li>
                     </ul>
                 </div>
             </header>
 
             <div class="hr">
             </div>
             <div class="liks_shows">
                 <a href="products/${item.id}">
                 <button class="show_more">التقديم</button>
             </a>
             </div>
         </div>
     </div>
 </a>
 </div> `;

    return html;
}
