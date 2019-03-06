package com.example.epsilon.http;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    private EditText etxtLatitud;
    private EditText etxtLongitud;
    private EditText etxtId;
    private RequestQueue requestQueue;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etxtLatitud = (EditText)findViewById(R.id.etxtLatitud);
        etxtLongitud = (EditText)findViewById(R.id.etxtLongitud);
        etxtId = (EditText)findViewById(R.id.etxtId);
    }

    /*
    * */
    private void insertToServer(String URL) {
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Toast.makeText(getApplicationContext(), "OPERACION EXITOSA..", Toast.LENGTH_SHORT).show();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
            }
        }){
            /*
            * agregamos los parametros que se desean enviar al servidor
            * */
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();

                params.put("x", etxtLatitud.getText().toString());
                params.put("y", etxtLongitud.getText().toString());

                return params;
            }
        };

        requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    /*
    * la recuperacion de datos es mediante el uso de json(formato)
    *
    * */
    private void selectFromServer(String URL) {
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(URL, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                JSONObject jsonObject = null;

                for (int i = 0; i < response.length(); i++) {
                    try {
                        jsonObject = response.getJSONObject(i);
                        etxtLatitud.setText(jsonObject.getString("x"));
                        etxtLongitud.setText(jsonObject.getString("y"));
                    }
                    catch (JSONException e) {
                        Toast.makeText(getApplicationContext(), e.getMessage(), Toast.LENGTH_SHORT).show();
                    }
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(), "error\n" + error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });

        requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(jsonArrayRequest);
    }

    /*
    * eventos para los botones de la app
    * */
    public void btnSet(View view) {
        insertToServer("http://192.168.1.105/AppWeb/insert.php");
    }

    public void btnSearch(View view) {
        selectFromServer("http://192.168.1.105/AppWeb/search.php?id=" + etxtId.getText());
    }

    public void btnOtro(View view) {
        selectFromServer("http://192.168.1.105/AppWeb/search.php?id=" + etxtId.getText());
    }
}
