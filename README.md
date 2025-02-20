# 🌐 Plataforma Web de Servicios y APIs

📌 **Descripción**  
Este proyecto es una plataforma web diseñada para la implementación y consumo de **servicios web** utilizando **SOAP, RSS y APIs externas**.  
Se divide en tres actividades principales:  

1️⃣ **Servicios SOAP**: Permite recuperar información de módulos formativos desde una base de datos.  
2️⃣ **Consumo de RSS**: Obtiene noticias en tiempo real desde el canal RSS de EuropaPress.  
3️⃣ **Integración con la API de AEMET**: Recupera y muestra predicciones meteorológicas actualizadas.  

El proyecto está desarrollado en **PHP, MySQL y JavaScript**, con una interfaz adaptable en **HTML y CSS**.  

---

## 🚀 Tecnologías Utilizadas
- 🖥 **Frontend:** HTML, CSS, JavaScript  
- ⚙️ **Backend:** PHP  
- 🗄 **Base de Datos:** MySQL  
- 🌐 **Servicios Web:** SOAP, RSS, API AEMET  
- 📦 **Servidor Local:** XAMPP, Apache  

---

## 🛠 Instalación y Ejecución
Sigue estos pasos para instalar y ejecutar el proyecto en tu entorno local:

1️⃣ **Descargar y configurar el servidor**  
   - Instala [XAMPP](https://www.apachefriends.org/es/index.html) si aún no lo tienes.  
   - Asegúrate de que los módulos **Apache** y **MySQL** estén activos.  

2️⃣ **Clonar o copiar el proyecto**  
   - Coloca los archivos en el directorio del servidor web, por ejemplo:  
     ```
     C:\xampp\htdocs\UT7_SP_SuárezBritoNoa
     ```  

3️⃣ **Configurar la base de datos**  
   - Abre **phpMyAdmin** y crea la base de datos ejecutando el siguiente comando SQL:  
     ```sql
     CREATE DATABASE IF NOT EXISTS fp;
     USE fp;
     ```
   - Importa el archivo `.sql` ubicado en `Actividad_1/sql/fp.sql`.  

4️⃣ **Configurar la conexión a la base de datos**  
   - Edita `conexion.php` en `Actividad_1/soap/` y asegúrate de que los datos coincidan con tu entorno:  
     ```php
     $hostDB = 'localhost';  // Dirección del servidor MySQL
     $nombreDB = 'fp';   // Nombre de la base de datos
     $usuarioDB = 'root';    // Usuario de la base de datos
     $contraDB = '';         // Contraseña (vacío en XAMPP por defecto)
     ```

5️⃣ **Ejecutar el proyecto**  
   - Abre tu navegador y accede a:  
     ```
     http://localhost/UT7_SP_SuarezBritoNoa/Actividad_1
     http://localhost/UT7_SP_SuarezBritoNoa/Actividad_2
     http://localhost/UT7_SP_SuarezBritoNoa/Actividad_3
     ```

---

## 📌 Funcionalidades Principales
✅ **Servicios SOAP** para consultar información sobre módulos formativos desde una base de datos.  
✅ **Consumo de RSS** que obtiene y muestra noticias en tiempo real de EuropaPress.  
✅ **Integración con la API de AEMET** para visualizar predicciones meteorológicas actualizadas.  
✅ **Sistema de consultas y visualización de datos en tablas** con diseño responsivo.  
✅ **Interfaz intuitiva** con HTML, CSS y JavaScript.  

---

🚀 _¡Gracias por visitar este proyecto! Si tienes dudas o sugerencias, no dudes en compartirlas._  
