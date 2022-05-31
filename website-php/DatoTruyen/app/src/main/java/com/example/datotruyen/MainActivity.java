package com.example.datotruyen;

import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.PopupMenu;
import android.widget.Toast;

import com.example.datotruyen.Adapter.TruyenAdapter;
import com.example.datotruyen.Object.Truyen;
import com.example.datotruyen.api.Apilaytruyen;
import com.example.datotruyen.interfaces.Laytruyenve;
import com.example.datotruyen.storage.SharedPrefManager;
import com.google.android.material.navigation.NavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity implements Laytruyenve, PopupMenu.OnMenuItemClickListener {
    EditText edttim;
    ArrayList<Truyen> arrayList ;
    TruyenAdapter truyenAdapter;
    RecyclerView recyclerView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        new Apilaytruyen(this).execute();
        recyclerView = (RecyclerView)findViewById(R.id.rey);
        recyclerView.setHasFixedSize(true);
        GridLayoutManager gridLayoutManager = new GridLayoutManager(this,3);
        gridLayoutManager.setOrientation(GridLayoutManager.VERTICAL);
        recyclerView.setLayoutManager(gridLayoutManager);
        arrayList = new ArrayList<>();

        final String non = SharedPrefManager.getInstance(this).getemail();




        edttim = (EditText)findViewById(R.id.tim);
        edttim.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {

            }

            @Override
            public void afterTextChanged(Editable s) {
                String a = edttim.getText().toString();
                truyenAdapter.sortTruyen(a);
            }
        });
    }

    @Override
    public void batdau() {
        Toast.makeText(this,"Loading",Toast.LENGTH_SHORT).show();
    }

    @Override
    public void ketthuc(String data) {
        try {
            arrayList.clear();
            JSONArray array = new JSONArray(data);
            for(int i=0;i< array.length();i++)
            {
                JSONObject o = array.getJSONObject(i);
                arrayList.add(new Truyen(o));
            }
            truyenAdapter = new TruyenAdapter(arrayList,getApplicationContext());
            recyclerView.setAdapter(truyenAdapter);
        }catch (JSONException e){

        }
    }

    @Override
    public void biLoi() {
        Toast.makeText(this,"Error",Toast.LENGTH_SHORT).show();
    }

    public void update(View view) {
        new Apilaytruyen(this).execute();
    }

    public void popup(View view) {
        PopupMenu popupMenu = new PopupMenu(this,view);
        popupMenu.setOnMenuItemClickListener(this);
        popupMenu.inflate(R.menu.popup_menu);
        popupMenu.show();
    }

    @Override
    public boolean onMenuItemClick(MenuItem item) {
        switch (item.getItemId()){
            case R.id.item1:
                Toast.makeText(this,"Trang chủ",Toast.LENGTH_SHORT).show();
                return false;
            case R.id.item2:
                Intent intent = new Intent(MainActivity.this,ProfileActivity.class);
                startActivity(intent);
                return true;
            case R.id.item3:
                Intent s = new Intent(MainActivity.this,LoginActivity.class);
                SharedPrefManager.getInstance(this).clear();
                startActivity(s);
                return true;
            default:
                return false;

        }
    }
}
