export const json = {
    "checkErrorsMode": "onValueChanged",
    "pages": [
     {
      "name": "page1",
      "elements": [
       {
        "type": "matrixdynamic",
        "name": "relatives",
        "title": "Please enter all blood relatives you know",
        "columns": [
         {
          "name": "relativeType",
          "title": "Relative",
          "cellType": "dropdown",
          "isRequired": true,
          "choices": [
           "father",
           "mother",
           "brother",
           "sister",
           "son",
           "daughter"
          ]
         },
         {
          "name": "firstName",
          "title": "First name",
          "cellType": "text",
          "isRequired": true
         },
         {
          "name": "lastName",
          "title": "Last name",
          "cellType": "text",
          "isRequired": true
         }
        ],
        "detailPanelMode": "underRow",
        "rowCount": 1,
        "addRowText": "Add a blood relative",
        "removeRowText": "Remove the relative"
       }
      ]
     }
    ]
   };