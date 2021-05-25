

using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;


public class logincontroller : MonoBehaviour
{
    public InputField mail_input;
    public InputField pass_input;


    public void login(){
        string correo = mail_input.text.ToString();
        string contraseña = pass_input.text.ToString();
            if (correo.Length !=0 && contraseña.Lenght != 0){
                echo "hola";
                StartCoroutine(InicioSesion(correo, contraseña));
            }else{
                print("Has puesto algo mal");
            }

    }
     IEnumerator IniciSessio(string correo,string contraseña){
        string url = "http://dawjavi.insjoaquimmir.cat/mbalague/curso2021/M03/consulta.php";
        WWWForm form = new WWWForm();
        form.AddField("correo", correo);
        form.AddField("contraseña", contraseña);

        using(UnityWebRequest www = UnityWebRequest.Post(url, form)){
            yield return www.SendWebRequest();
            var respuesta = www.downloadHandler.text;
            Debug.Log(respuesta);
        }    
    }
}