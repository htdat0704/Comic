package com.example.datotruyen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class RegisterActivity extends AppCompatActivity {
    TextView btnback;
    EditText etName,etEmail,etPassword;
    Button btnRegis;

    final String url_Regis = "http://192.168.43.231/appandroid/register_user.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        btnback = findViewById(R.id.tv_getback);
        etName = findViewById(R.id.et_name);
        etEmail = findViewById(R.id.et_reg_email);
        etPassword = findViewById(R.id.et_reg_password);
        btnRegis = (Button) findViewById(R.id.btn_register);


        btnRegis.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String Name =etName.getText().toString();
                String Email =etEmail.getText().toString();
                String Password =etPassword.getText().toString();

                new RegisterUser().execute(Name,Email,Password);
            }
        });

        btnback.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent is = new Intent(RegisterActivity.this, LoginActivity.class);
                startActivity(is);
            }
        });
    }


    public class RegisterUser extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... strings) {
            String Name = strings[0];
            String Email = strings[1];
            String Password = strings[2];
            String finalURL = url_Regis + "?user_name=" + Name +
                    "&user_id=" + Email +
                    "&user_password=" + Password;
            try{
            OkHttpClient okHttpClient = new OkHttpClient();
            Request request = new Request.Builder().url(finalURL).get().build();

            Response response = null;

            try {
                response = okHttpClient.newCall(request).execute();
                if(response.isSuccessful()){
                    String result = response.body().string();
                    if(result.equalsIgnoreCase("User registered successfully")){
                        ShowToast("Đăng ký thành công");
                        Intent i = new Intent(RegisterActivity.this, LoginActivity.class);
                        startActivity(i);
                        finish();
                    }else if(result.equalsIgnoreCase("User already exists"))
                    {
                        ShowToast("Tài khoản đã tồn tại");

                    }else{
                        ShowToast("Vui lòng thử lại");
//                        Intent i = new Intent(RegisterActivity.this, LoginActivity.class);
//                        startActivity(i);
//                        finish();

                    }
                }
            }catch (Exception e){
                e.printStackTrace();

            }
            }catch (Exception e){
                e.printStackTrace();
            }

            return null;
        }
    }
    public void ShowToast(final String text){
        this.runOnUiThread(new Runnable() {
            @Override
            public void run() {
                Toast.makeText(RegisterActivity.this,text,Toast.LENGTH_SHORT).show();
            }
        });
    }
}
