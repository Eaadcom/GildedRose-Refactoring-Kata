# Gilded Rose Refactoring Kata

I rewrote this README to document my approach to this Kata (PHP).

# Steps taken

1. Checked the requirements and fixed the broken test.
2. Made sure the approval tests worked, the testThirtyDays test was very useful during this exercise. Was unsure if the Aged Brie was being updated as intended but decided to keep the original behavior.
3. Decided on a better eventual structure for the program based off of the requirements, created a specific folder for subclasses of Item.
4. Created AgedBrieItem, ItemFactory & UpdateableInterface.
5. First I made sure my AgedBrieItem worked, I wrote some extra tests in conjunciton with writing this class to make sure it worked as intended per the requirements.
6. Replaced the creation of the Item "Aged Brie", with the creation of AgedBrieItem via the ItemFactory.
7. Added a basic version of the other required subclasses of Item, incorporated these in the ItemFactory and wrote tests for the ItemFactory.
8. Created a first version of the update function for all of the Item subclasses, wrote tests for them.
9. Took a more in depth look at the requirements and the current logic in the updateQuality(), rewrote the logic in my update functions to be more readable and actually funciton as intended.
10. Replaced the old code in updateQuality() with my current implementation.
