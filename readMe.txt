Přihlašovací údaje si musíš změnit v souboru config.php, tam si zadáš localhost server a údaje, kdyby nevěděl co s tím tak napiš, teď jsou tam údaje z mého maca.
Vytvořil jsem ti uživatele jiri s heslem Letmein1, protože se mi nechce opisovat ti sem svoje heslo, které má logiku, ale na první pohled je to změt písmenek a čísel,
heslo se tam dá změnit, ale teď je to asi jedno. Hesla jsou hashovaná, takže nikdo nemá šanci odhalit co za heslo tam je (pokud teda nemá kvantový počítač, což asi nemá).
Je potřeba na stránce register.php přepsat ten sql dotaz, který se stará o uložení uživatele do databáze. Je tam tabulka clients a v té je pár sloupečků. Formulář už jsem tak nějak
upravil, ale asi to pořád bude chtít trošku přepsat. 
Databázi si nahraješ z toho database.sql souboru. Když na to nepřijdeš tak ti to ukážu. Musí se jmenovat stejně jako ta moje databáze (Kalasova) a ve složce import tam pak vybereš ten
soubor.