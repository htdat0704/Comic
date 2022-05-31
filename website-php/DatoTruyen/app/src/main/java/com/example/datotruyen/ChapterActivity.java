package com.example.datotruyen;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;


import android.content.Intent;

import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.datotruyen.Adapter.Chpdapter;
import com.example.datotruyen.Object.Chp;
import com.example.datotruyen.api.Apilaychp;
import com.example.datotruyen.interfaces.LayChpve;
import com.example.datotruyen.storage.SharedPrefManager;

import org.json.JSONArray;
import org.json.JSONException;

import java.io.IOException;
import java.text.NumberFormat;
import java.util.ArrayList;
import java.util.Locale;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class ChapterActivity extends AppCompatActivity implements LayChpve {
    ImageView imghinh;
    TextView txtten,txtnoidun;
    RecyclerView rycl;
    ArrayList<Chp> arrayList;
    Chpdapter chpdapter;
    Button btnlike,btnunlike;
    String idtruyenne = SharedPrefManager.getInstance(this).getIdtruyen();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chapter);

        Locale localeVN = new Locale("vi", "VN");
        final NumberFormat vn = NumberFormat.getInstance(localeVN);

        imghinh=findViewById(R.id.hinhanhchap);
        txtten= findViewById(R.id.tenchap);
        txtnoidun = findViewById(R.id.noidungg);
        btnlike = findViewById(R.id.likene);
        btnunlike = findViewById(R.id.unlikene);

        int solikebd = Integer.parseInt(SharedPrefManager.getInstance(this).getsoLike());
        String bandau1 = vn.format(solikebd);
        btnlike.setText(bandau1);

        int sounlikebd = Integer.parseInt(SharedPrefManager.getInstance(this).getsounLike());
        String bandau2 = vn.format(sounlikebd);
        btnunlike.setText(bandau2);


        btnunlike.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new Apitangunlike(idtruyenne).execute();
                int sounlikebd2 = Integer.parseInt(SharedPrefManager.getInstance(v.getContext()).getsounLike());
                sounlikebd2++;
                String unlikebandau1 = vn.format(sounlikebd2);
                btnunlike.setText(unlikebandau1);
                String luu = String.valueOf(sounlikebd2);
                SharedPrefManager.getInstance(v.getContext()).saveunLike(luu);

            }
        });
        btnlike.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new Apitanglike(idtruyenne).execute();
                int solikebd2 = Integer.parseInt(SharedPrefManager.getInstance(v.getContext()).getsoLike());
                solikebd2++;
                String likebandau1 = vn.format(solikebd2);
                btnlike.setText(likebandau1);
                String luu2 = String.valueOf(solikebd2);
                SharedPrefManager.getInstance(v.getContext()).saveLike(luu2);
            }
        });

        String t = SharedPrefManager.getInstance(this).getIdtruyen();
        String nd = SharedPrefManager.getInstance(this).getnoidung();
        String tenn = SharedPrefManager.getInstance(this).gettentruyen();
        String hinhanh = SharedPrefManager.getInstance(this).getpictureT();

        new Apilaychp(this,t).execute();

        txtnoidun.setText(nd);
        txtten.setText(tenn);
        Glide.with(this).load(hinhanh).into(imghinh);


        rycl = (RecyclerView)findViewById(R.id.r);
        rycl.setHasFixedSize(true);
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this,LinearLayoutManager.VERTICAL,false);
        rycl.setLayoutManager(linearLayoutManager);
        arrayList = new ArrayList<>();



    }



    @Override
    public void batdau() {
        Toast.makeText(this,"Loading",Toast.LENGTH_SHORT).show();
    }

    @Override
    public void ketthuc(String data) {
        try {
            JSONArray array =  new JSONArray(data);
            for(int i=0;i< array.length();i++){
                Chp chp = new Chp(array.getJSONObject(i));
                arrayList.add(chp);

            }
            Chpdapter chpdapter = new Chpdapter(getApplicationContext(), arrayList);
            rycl.setAdapter(chpdapter);

        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    @Override
    public void biLoi() {
        Toast.makeText(this,"Error",Toast.LENGTH_SHORT).show();
    }

    public void backk(View view) {
        Intent ias = new Intent(ChapterActivity.this,MainActivity.class);
        startActivity(ias);
    }

    public class Apitanglike extends AsyncTask<Void,Void,Void> {

        String idtruyen;

        public Apitanglike(String idtruyen) {
            this.idtruyen = idtruyen;
        }

        @Override
        protected Void doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();
            HttpUrl localUrl = HttpUrl.parse("http://192.168.43.231/appandroid/like.php?idtruyen="+idtruyen);
            Request request = new Request.Builder().url(localUrl).build();
            try{
                Response response = okHttpClient.newCall(request).execute();

            } catch (IOException e) {
                e.printStackTrace();
            }

            return null;
        }
    }
    public class Apitangunlike extends AsyncTask<Void,Void,Void> {

        String idtruyen;

        public Apitangunlike(String idtruyen) {
            this.idtruyen = idtruyen;
        }

        @Override
        protected Void doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();
            HttpUrl localUrl = HttpUrl.parse("http://192.168.43.231/appandroid/likeun.php?idtruyen="+idtruyen);
            Request request = new Request.Builder().url(localUrl).build();
            try{
                Response response = okHttpClient.newCall(request).execute();

            } catch (IOException e) {
                e.printStackTrace();
            }

            return null;
        }
    }


}
