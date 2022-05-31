package com.example.datotruyen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.datotruyen.Object.Userlg;
import com.example.datotruyen.api.Apilayprofile;
import com.example.datotruyen.interfaces.Layprofileve;
import com.example.datotruyen.storage.SharedPrefManager;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.ArrayList;

public class ProfileActivity extends AppCompatActivity implements Layprofileve {
    ImageView ivm;
    TextView txname,txemail,txpass;
    ArrayList<Userlg> userlgArrayList;
    Button btnout,btnsu;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        ivm = findViewById(R.id.iv_user);
        txemail = findViewById(R.id.emailu);
        txname = findViewById(R.id.nameu);
        txpass = findViewById(R.id.passu);
        btnout = findViewById(R.id.btnuotr);
        btnsu = findViewById(R.id.btedis);

        String mai = SharedPrefManager.getInstance(this).getemail();

        new Apilayprofile(this,mai).execute();

        userlgArrayList = new ArrayList<>();

        btnout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent iiiii = new Intent(ProfileActivity.this,LoginActivity.class);
                startActivity(iiiii);
            }
        });

        btnsu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent iiii = new Intent(ProfileActivity.this,EditActivity.class);
                startActivity(iiii);
            }
        });
    }

    @Override
    public void batdau() {
        Toast.makeText(this,"Loading",Toast.LENGTH_SHORT).show();

    }

    @Override
    public void ketthuc(String data) {
        try{
            JSONArray array = new JSONArray(data);
            for(int i =0;i<array.length();i++)
            {
                Userlg userlg = new Userlg(array.getJSONObject(i));
                userlgArrayList.add(userlg);
            }
            SharedPrefManager.getInstance(ProfileActivity.this).saveName(userlgArrayList.get(0).getName());
            SharedPrefManager.getInstance(ProfileActivity.this).savePass(userlgArrayList.get(0).getPassword());
            SharedPrefManager.getInstance(ProfileActivity.this).saveUser(userlgArrayList.get(0).getEmail());
            SharedPrefManager.getInstance(ProfileActivity.this).savePic(userlgArrayList.get(0).getPic());
            txname.setText(userlgArrayList.get(0).getName());
            txpass.setText(userlgArrayList.get(0).getPassword());
            txemail.setText(userlgArrayList.get(0).getEmail());
            Glide.with(this).load(userlgArrayList.get(0).getPic()).into(ivm);
        }catch(JSONException e){
            e.printStackTrace();
        }
    }

    @Override
    public void biLoi() {
        Toast.makeText(this,"Error",Toast.LENGTH_SHORT).show();
    }

    public void homerun(View view) {
        Intent ias = new Intent(ProfileActivity.this,MainActivity.class);
        startActivity(ias);
    }
}
