/*
==============================
* Front-end 3d Configure Code
==============================
 */


Unlimited3D.init(options, {});

// function changeMaterial(matName) {
//     Unlimited3D.changeMaterial({
//         parts: ["base", "base_001"],
//         material: matName,
//     });
// }
//
// function changeMaterial2(matName) {
//     Unlimited3D.changeMaterial({
//         parts: ["Seat", "Seat_001"],
//         material: matName,
//     });
// }
//
// function changeMaterial3(matName) {
//     Unlimited3D.changeMaterial({
//         parts: ["Cube_001", "Cube_008"],
//         material: matName,
//     });
// }

function changeMaterialDynamic(matName, parts) {
    let getParts = parts.split("-");
    console.log(getParts);
    Unlimited3D.changeMaterial({
        parts: getParts,
        material: matName,
    });
}

function getImage2() {

}

// function changeMaterial4(matName) {
//     Unlimited3D.changeMaterial({
//         parts: [
//             "Cube_002",
//             "Cube_003",
//             "Cube_004",
//             "Cube_005",
//             "Cube_006",
//             "Cube_007",
//         ],
//         material: matName,
//     });
// }

//       function imgToBase64(img) {
//   const canvas = document.createElement('canvas');
//   const ctx = canvas.getContext('2d');
//   canvas.width = img.width;
//   canvas.height = img.height;

//   // I think this won't work inside the function from the console
//   img.crossOrigin = 'anonymous';

//   ctx.drawImage(img, 0, 0);

//   return canvas.toDataURL();
// }

// function getMateial(parts) {
//     console.log(parts);
//     Unlimited3D.getAvailableMaterials(function (error, result) {
//         setMaterial(result, parts);
//     });
// }
//
// function setMaterial(matName, parts) {
//     let ul = document.querySelector(".single-filter-widget--list");
//     let newParts = parts.join("-");
//     let newHtml = "";
//     matName.forEach((element) => {
//         newHtml += `
// 				<li class="mb-0 pt-0 pb-0 mr-10">
// 					<a class="active" href="javascript:void(0)"
// 						onclick="changeMaterialDynamic('${element.shortName}', '${newParts}')">
// 						<span class="color-picker gray"></span>
// 					</a>
// 				</li>
// 				`;
//     });
//
//     ul.innerHTML = newHtml;
// }
