# LibraryOnion Dokumentace Názvosloví

##  GitHub Repozitář
[LibraryOnion GitHub Repozitář](https://github.com/KaliszSatInfo/LibraryOnion)

## Členové
- Fryšták
- Kalisz
- Jarošová

---

##  Struktura databáze
- **Jazyk**: Angličtina
- **Konvence pojmenování**:
    - **Čísla v názvech** (databáze, tabulky, sloupce a názvy klíčů) budou v `jednotném čísle`.
  
    - **Výjimka**: Tabulka `migrations` je v `množném čísle` (automaticky generovaná, nelze změnit z důvodů funkčnosti).
    - **Víceslovné názvy**: Používejte `snake_case` (každé slovo odděleno podtržítkem "_" ).
    - **Všechno malými písmeny**.

---

##  Konvence pojmenování v kůdu
### **Obecná pravidla (anglicky, jednotné i množné číslo podle potřeby)**
- **Proměnné**: `camelCase` (např. `library`, `data`, `index`, `items`)
- **Metody**: `camelCase` (např. `loadHomepage`, `getBooksAuthors`)
---
### **Struktura MVC**
#### **Controllery**
- **PascalCase** | Formát: `[Controller][View]`
- Příklad: `ControllerHomepage`

#### **Viewčka**
- **PascalCase** | Formát: `[View][Controller]`
- Příklad: `ViewHomepage`

#### **Knihovny (Libraries)**
- **PascalCase** | Formát: `[Library][Controller NEBO View]`
- Příklad: `LibraryHomepage`

#### **Modely**
- **PascalCase** | Formát: `[Model][Table]`
- Příklad: `ModelBook`, `ModelBookAuthor`

#### **Migrace**
- **PascalCase** | Formát: `[Migration][Table]`
- Příklad: `MigrationBook`, `MigrationBookAuthor`

#### **Seedery**
- **PascalCase** | Formát: `[Seeder][Table]`
- Příklad: `SeederBook`, `SeederBookAuthor`
- **Výjimka**: `SeederDatabase` (soubor, který spouští všechny seedery, nesedí na formát `[Seeder][Table]`)

---

##  Assets & Šablony
- **Soubory ve složkách `assets/`, `template/` a `layout/` by měly být všechno malými písmeny.**
