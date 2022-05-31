package com.example.datotruyen.Object;

import org.json.JSONException;
import org.json.JSONObject;

public class Userlg {
    private String email,name,password,pic;

    public Userlg(JSONObject o) throws JSONException {
        pic = o.getString("anh");
        email = o.getString("email");
        name = o.getString("name");
        password = o.getString("password");
    }

    public Userlg(String email,String name,String password,String pic) {
        this.pic = pic;
        this.email = email;
        this.name = name;
        this.password=password;
    }

    public String getPic() {
        return pic;
    }

    public void setPic(String pic) {
        this.pic = pic;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
