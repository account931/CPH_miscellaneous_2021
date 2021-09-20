Full version is located in Bootstrap folder. All the latest implementation are done in Bootstrap folder
Root folder(No Bootstrap) is limited version so far.

How it works:
In HTML:
1. The layout is the same for ever checkbox(buttons), we only have diffrent divs for inputs.
In order that the same buttons work with diff div, each input div should have a specific ID = checkboxID+"Div",
first input in those divs = checkboxID+"_Input". (i.e id="randListDiv")

In JS:
We detect the checkbox selected, get its ID and fire a relevant function = checkboxID+"CoreAction()", i.e (randListCoreAction())
